<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Result;
use Illuminate\Validation\Rule;
use App\Models\Schedule;
use App\Models\Hastag;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Point;
use Illuminate\Support\Facades\DB;

class DashboardTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.teams.index', [
            'teams' => Team::where('user_id', auth()->user()->id)->get(),
            'title' => 'TEAM'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        if ($team->user_id != auth()->user()->id) {
            abort(404);
        }
        $point = Point::where('tournament_id', $team->tournament->id)->get();
        return view('dashboard.teams.show', [
            "team" => $team,
            'p' => Point::where('tournament_id', $team->tournament->id)->first(),
            'hastags' => Hastag::where('tournament_id', $team->tournament->id)->get(),
            "slot" => $team->where('tournament_id', $team->tournament->id)->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if ($team->user_id != auth()->user()->id) {
            abort(404);
        }
        Team::destroy($team->id);
        Result::where('team_id', $team->id)->delete();
        return redirect('/dashboard/teams')->with('keluar', 'TIM MU BERHASIL KELUAR DARI TURNAMEN');
    }

    public function team(Team $team)
    {
        if ($team->user_id != auth()->user()->id) {
            abort(404);
        }
        return view(
            'dashboard.teams.team',
            [
                "team" => $team,
                "tournament" => $team->tournament,
                "tim" => $team->where('tournament_id', $team->tournament->id)->get(),
                "slot" => $team->where('tournament_id', $team->tournament->id)->count()
            ]
        );
    }

    public function schedule(Team $team, Schedule $schedule)
    {
        if ($team->user_id != auth()->user()->id) {
            abort(404);
        }
        $results = DB::table('schedules')
            ->select('*')
            ->where('tournament_id', '=', $team->tournament->id)->get();

        return view(
            'dashboard.teams.schedule',
            [
                "team" => $team,
                "schedules" => $results,
                "slot" => $team->where('tournament_id', $team->tournament->id)->count()
            ]
        );
    }

    public function scheduleShow(Team $team, Schedule $schedule)
    {
        $results = Result::where('schedule_id', $schedule->id)->orderByRaw('rankPoint + killPoint DESC')->get();
        if ($schedule->tournament_id != $team->tournament->id) {
            abort(404);
        }

        $tournament = $team->tournament;

        $schedule->load('tournament');

        return view('dashboard.teams.scheduleShow', compact('tournament', 'schedule', 'results', 'team'));
    }

    public function standing(Team $team)
    {
        if ($team->user_id != auth()->user()->id) {
            abort(404);
        }
        return view(
            'dashboard.teams.standing',
            [
                "title" => "Single tournament",
                "active" => "tournaments",
                "team" => $team,
                "teams" => Team::where('tournament_id', $team->tournament->id)->get(),
                "results" => DB::table('results')
                    ->select('team_id', DB::raw('SUM(killPoint + rankPoint) as total'), DB::raw('SUM(killPoint) as totalkill'), DB::raw('SUM(rankPoint) as totalrank'))
                    ->groupBy('team_id')
                    ->orderByDesc(DB::raw('SUM(killPoint + rankPoint)'))
                    ->get(),
            ]
        );
    }

    public function certificate(Team $team)
    {
        if ($team->user_id != auth()->user()->id) {
            abort(404);
        }

        $certi = Certificate::where('tournament_id', $team->tournament->id)
            ->where('team_id', $team->id)->get();

        if ($certi->count()) {
            return view(
                'dashboard.teams.certi',
                [
                    "title" => "certificate",
                    "team" => $team,
                    "certi" => $certi
                ]
            );
        } else {
            return redirect('/dashboard/teams/' . $team->slug . '/standing');
        }
    }

    public function klaim(Request $request, Team $team)
    {
        $rules = [
            'team' => 'required',
            'tournament' => 'required',
            'user_id' => 'required',
            'juara' => 'nullable',
            'keterangan' => 'required'
        ];
        $validatedData = $request->validate($rules);
        Certificate::where('team_id', $team->id)
            ->update($validatedData);

        return redirect('/dashboard/teams/' . $team->slug . '/standing/certi')->with('success', 'SERTIFIKAT BERHASIL DIKLAIM');
    }
}
