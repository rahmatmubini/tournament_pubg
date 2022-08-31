<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tournament $tournament)
    {
        if ($tournament->user_id != auth()->user()->id) {
            abort(404);
        }

        $teams = $tournament->teams()->with(['tournament'])->get();
        return view('dashboard.admin.team.index', compact('tournament', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tournament $tournament)
    {
        return view('dashboard.admin.team.create', [
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
            'user_id' => ['required', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'tournament_id' => 'required',
            'name' => ['required', 'max:255', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'slug' => ['required', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'email' => ['required', 'email', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'nomor' => ['required', 'numeric', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],

            'image' => 'image|file|max:1024',

            'player1' => ['required', 'min:4', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'player2' => ['required', 'min:4', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'player3' => ['required', 'min:4', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'player4' => ['required', 'min:4', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'idPlayer1' => ['required', 'min:4', 'numeric', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'idPlayer2' => ['required', 'min:4', 'numeric', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'idPlayer3' => ['required', 'min:4', 'numeric', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })],
            'idPlayer4' => ['required', 'min:4', 'numeric', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })]
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('tournament-images');
        }
        $team = $tournament->teams()->create($validatedData);
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/teams')->with('success', 'BERHASIL MENAMBAHKAN TIM');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament, Team $team)
    {
        if ($team->tournament_id != $tournament->id) {
            abort(404);
        }

        $team->load('tournament');

        return view('dashboard.admin.team.show', compact('tournament', 'team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament, Team $team)
    {
        if ($team->tournament_id != $tournament->id) {
            abort(404);
        }
        $team->load('tournament');
        return view('dashboard.admin.team.edit', compact('tournament', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament, Team $team)
    {
        $rules = [
            'user_id' => 'required|',
            'tournament_id' => 'required',
            'name' => 'required|max:255|',
            'nomor' => 'required|numeric|',
            'image' => 'image|file|max:1024',
            'player1' => ['required', 'min:4',],
            'player2' => ['required', 'min:4',],
            'player3' => ['required', 'min:4',],
            'player4' => ['required', 'min:4',],
            'idPlayer1' => ['required', 'min:4', 'numeric'],
            'idPlayer2' => ['required', 'min:4', 'numeric'],
            'idPlayer3' => ['required', 'min:4', 'numeric'],
            'idPlayer4' => ['required', 'min:4', 'numeric']
        ];

        if ($request->slug != $team->slug) {
            $rules['slug'] = 'required|unique:teams';
        }

        if ($request->email != $team->email) {
            $rules['email'] = ['required', 'string', 'email', 'max:191', Rule::unique('teams')->where(function ($query) use ($request) {
                return $query->where('tournament_id', $request->tournament_id);
            })];
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('team-images');
        }

        Team::where('id', $team->id)
            ->update($validatedData);

        return redirect('/dashboard/tournaments/' . $tournament->slug . '/teams')->with('success', 'BERHASIL MEMPERBARUI TIM ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament, Team $team)
    {
        // if ($tournament->image) {
        //     Storage::delete($tournament->image);
        // }

        if ($team->tournament_id != $tournament->id) {
            abort(404);
        }

        // Team::destroy($team->id);
        $team->delete();
        return redirect('/dashboard/tournaments/' . $tournament->slug . '/teams')->with('error', 'TIM TELAH DI KICK');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Team::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
