<?php

namespace App\Http\Controllers;

use App\Models\Hastag;
use App\Models\Schedule;
use App\Models\Tournament;
use App\Models\Result;
use App\Models\Point;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tournament $tournament)
    {
        $schedules = $tournament->schedules()->with(['tournament'])->get();
        return view('dashboard.admin.schedule.index', compact('tournament', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tournament $tournament)
    {
        return view('dashboard.admin.schedule.create', [
            'tournament' => $tournament
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
            'day' => 'required|numeric|digits_between:1,2',
            'slug' => 'required|unique:schedules',
            'date' => 'required|max:255|after:yesterday|after_or_equal:' . $tournament->matchDate,
            'map' => 'required|max:255',
            'time' => ['required', 'after_or_equal:' . $tournament->time, Rule::unique('schedules')->where(function ($query) use ($request) {
                return $query->where([
                    ['time', '=', $request->time],
                    ['tournament_id', '=', $request->tournament_id]
                ]);
            })],
            'match' => ['required', 'numeric', 'digits_between:1,2', Rule::unique('schedules')->where(function ($query) use ($request) {
                return $query->where([
                    ['day', '=', $request->day],
                    ['tournament_id', '=', $request->tournament_id]
                ]);
            })],
        ]);

        $schedule = $tournament->schedules()->create($validatedData);

        return redirect('/dashboard/tournaments/' . $tournament->slug . '/schedules')->with('success', 'BERHASIL MENAMBAH JADWAL PERTANDINGAN');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament, Schedule $schedule)
    {
        $results = Result::where('schedule_id', $schedule->id)->orderByRaw('rankPoint + killPoint DESC')->get();
        if ($schedule->tournament_id != $tournament->id) {
            abort(404);
        }

        $schedule->load('tournament');

        return view('dashboard.admin.schedule.show', compact('tournament', 'schedule', 'results'));
    }

    public function resultCreate(Tournament $tournament, Schedule $schedule, Request $request)
    {
        $points = Point::where('tournament_id', $tournament->id)->get();
        return view('dashboard.admin.schedule.result', [
            "tournament" => $tournament,
            "teams" => Team::where('tournament_id', $tournament->id)->get(),
            "hastags" => Hastag::where('tournament_id', $tournament->id)->get(),
            "points" => $points,
            "schedule" => $schedule,
            "title" => "ADMIN"
        ]);
    }

    public function resultStore(Tournament $tournament, Schedule $schedule, Request $request)
    {
        $hastags = Hastag::where('tournament_id', $tournament->id)->get();
        $validatedData = $request->validate([
            'tournament_id' => 'required',
            'team_id' => ['required', Rule::unique('results')->where(function ($query) use ($request) {
                return $query->where('schedule_id', $request->schedule_id);
            })],
            'schedule_id' => 'required',
            'rank' => ['required', Rule::unique('results')->where(function ($query) use ($request) {
                return $query->where([
                    ['schedule_id', '=', $request->schedule_id],
                    ['tournament_id', '=', $request->tournament_id]
                ]);
            })],
            'killPoint' => 'required|numeric|digits_between:1,2',
            // 'image' => 'required|image|file|max:1024'
        ]);
        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('result-images');
        // }
        foreach ($hastags as $hastag) {
            if ($hastag->nomor === $request->rank) {
                $validatedData['rankPoint'] = $hastag->hastag;
            }
        }

        Result::create($validatedData);
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/schedules' . '/' . $schedule->slug)->with('success', 'BERHASIL INPUT DATA HASIL PERTANDINGAN');
    }

    public function deleteResult(Tournament $tournament, Schedule $schedule, Result $result)
    {
        // if ($schedule->tournament_id != $tournament->id) {
        //     abort(404);
        // }
        $schedule->load('tournament');
        $result->load('schedule');
        $result->delete();
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/schedules' . '/' . $schedule->slug)->with('error', 'HASIL PERTANDINGAN DIHAPUS');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament, Schedule $schedule)
    {
        if ($schedule->tournament_id != $tournament->id) {
            abort(404);
        }
        $schedule->load('tournament');
        return view('dashboard.admin.schedule.edit', compact('tournament', 'schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament, Schedule $schedule)
    {
        $rules = [
            'idRoom' => 'required|numeric',
            'passRoom' => 'required|numeric'
        ];
        $validatedData = $request->validate($rules);

        Schedule::where('id', $schedule->id)
            ->update($validatedData);

        return redirect('/dashboard/tournaments/' . $tournament->slug . '/schedules')->with('success', 'BERHASIL MEMPERBARUI JADWAL PERTANDINGAN');

        // $rules = [
        //     'day' => 'required|digits_between:1,2',
        //     'date' => 'required|max:255',
        //     'tournament_id' => 'required',
        //     'match' => 'required|digits_between:1,2',
        //     'map' => 'required|max:255',
        //     'time' => 'required|max:255'
        // ];

        // if ($request->slug != $schedule->slug) {
        //     $rules['slug'] = 'required|unique:schedules';
        // }

        // $validatedData = $request->validate($rules);

        // Schedule::where('id', $schedule->id)
        //     ->update($validatedData);

        // return redirect('/dashboard/tournaments/' . $tournament->slug . '/schedules')->with('success', 'BERHASIL MEMPERBARUI JADWAL PERTANDINGAN');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament, Schedule $schedule)
    {
        if ($schedule->tournament_id != $tournament->id) {
            abort(404);
        }
        $schedule->delete();
        Result::where('schedule_id', $schedule->id)->delete();
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/schedules')->with('error', 'JADWAL PERTANDINGAN DIHAPUS');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Schedule::class, 'slug', $request->day);
        return response()->json(['slug' => $slug]);
    }
}
