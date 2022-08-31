<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Standing;
use App\Models\Tournament;
use App\Models\Team;
use App\Models\Result;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tournament $tournament)
    {
        $teams = Team::where('tournament_id', $tournament->id)->get();
        $results = DB::table('results')
            ->select('team_id', DB::raw('SUM(killPoint + rankPoint) as total'), DB::raw('SUM(killPoint) as totalkill'), DB::raw('SUM(rankPoint) as totalrank'))
            ->groupBy('team_id')
            ->orderByDesc(DB::raw('SUM(killPoint + rankPoint)'))
            ->get();
        return view('dashboard.admin.standing.index', compact('tournament', 'teams', 'results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tournament $tournament)
    {
        return view('dashboard.admin.standing.create', [
            'tournament' => $tournament,
            'teams' => Team::where('tournament_id', $tournament->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tournament $tournament)
    {
        $validatedData =  $request->validate([
            'tournament_id' => 'required',
            'team_id' => ['required', Rule::unique('standings')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'chicken' => 'required|max:255',
            'rank_point' => 'required|max:255',
            'kill_point' => 'required|max:255'
        ]);
        $standing = $tournament->standings()->create($validatedData);
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/standings')->with('success', 'BERHASIL MENAMBAH HASIL AKHIR');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Standing  $standing
     * @return \Illuminate\Http\Response
     */
    public function show(Standing $standing)
    {
        //
    }

    public function sendiri(Tournament $tournament, Standing $standing)
    {
        return view('dashboard.admin.certi.sendiri', [
            'tournament' => $tournament,
            'teams' => Team::where('tournament_id', $tournament->id)->get()
        ]);
    }

    public function sendiriCreate(Request $request, Tournament $tournament, Standing $standing)
    {
        $validatedData =  $request->validate([
            'tournament_id' => 'required',
            'team_id' => ['required', Rule::unique('certificates')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'image' => 'image|file|max:1024'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('certificate-images');
        }
        Certificate::create($validatedData);
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/standings')->with('success', 'BERHASIL MENGIRIM SERTIFIKAT');
    }

    public function otomatis(Tournament $tournament, Standing $standing)
    {
        return view('dashboard.admin.certi.otomatis', [
            'tournament' => $tournament,
            'teams' => Team::where('tournament_id', $tournament->id)->get()
        ]);
    }

    public function otomatisCreate(Request $request, Tournament $tournament, Standing $standing)
    {
        $validatedData =  $request->validate([
            'tournament_id' => 'required',
            'team_id' => ['required', Rule::unique('certificates')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'juara' => ['required', Rule::unique('certificates')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            // 'tournament' => 'required',
            // 'team' => ['required', Rule::unique('certificates')->where(function ($query) use ($request) {
            //     return $query->where('tournament_id', $request->tournament_id);
            // })],
            // 'keterangan' => 'required|max:255'
            // 'user' => 'required',
        ]);
        Certificate::create($validatedData);
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/standings')->with('success', 'BERHASIL MENGIRIM SERTIFIKAT');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Standing  $standing
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament, Standing $standing)
    {
        if ($standing->tournament_id != $tournament->id) {
            abort(404);
        }
        $teams = Team::where('tournament_id', $tournament->id)->get();

        $standing->load('tournament');
        return view('dashboard.admin.standing.edit', compact('tournament', 'standing', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Standing  $standing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament, Standing $standing)
    {
        $rules = [
            'tournament_id' => 'required',
            'chicken' => 'required|max:255',
            'rank_point' => 'required|max:255',
            'kill_point' => 'required|max:255'
        ];

        if ($request->team_id != $standing->team_id) {
            $rules['team_id'] = ['required', Rule::unique('standings')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })];
        }

        $validatedData = $request->validate($rules);
        Standing::where('id', $standing->id)
            ->update($validatedData);

        return redirect('/dashboard/tournaments/' . $tournament->slug . '/standings')->with('success', 'HASIL AKHIR BERHASIL DIUBAH');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Standing  $standing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament, Standing $standing)
    {
        if ($standing->tournament_id != $tournament->id) {
            abort(404);
        }
        $standing->delete();
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/standings')->with('error', 'HASIL AKHIR DIHAPUS');
    }
}
