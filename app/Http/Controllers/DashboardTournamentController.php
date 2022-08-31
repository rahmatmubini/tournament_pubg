<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Game;
use App\Models\Hastag;
use App\Models\Schedule;
use App\Models\Team;
use App\Models\Point;
use App\Models\Standing;
use App\Models\Result;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DashboardTournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.index', [
            'tournaments' => Tournament::where('user_id', auth()->user()->id)->get(),
            'title' => 'ADMIN'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create', [
            'games' => Game::all(),
            'title' => 'ADMIN'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:tournaments',
            'prize' => 'required|max:255',
            'game_id' => 'required',
            'image' => 'image|file|max:1024',
            'registrationDate' => 'required|max:255|after:yesterday',
            'matchDate' => 'required|max:255|after:registrationDate',
            'matchAndDate' => 'required|max:255|after:matchDate',
            'time' => 'required|max:255',
            'slot' => 'required|digits:2|numeric|max:255',
            'location' => 'required|max:255',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('tournament-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Tournament::create($validatedData);

        return redirect('/dashboard/tournaments')->with('success', 'TURNAMEN BERHASIL DIBUAT');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        if ($tournament->user_id != auth()->user()->id) {
            abort(404);
        }
        $slot = Team::where('tournament_id', $tournament->id)->count();
        $p = Point::where('tournament_id', $tournament->id)->first();
        $point = Point::where('tournament_id', $tournament->id)->get();
        $hastag = Hastag::where('tournament_id', $tournament->id)->get();
        if ($point->count() &&  $hastag->count()) {
            return view('dashboard.admin.show', [
                'tournament' => $tournament,
                'slot' => $slot,
                'point' => $point,
                'hastags' => $hastag,
                'p' => $p
            ]);
        } else {
            return view('dashboard.admin.point.create', [
                'tournament' => $tournament,
                'point' => $point,
                'p' => $p,
                'hastag' => $hastag
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        return view('dashboard.admin.edit', [
            'tournament' => $tournament,
            'games' => Game::all(),
            'title' => 'ADMIN'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $rules = [
            'title' => 'required|max:255',
            'game_id' => 'required',
            'image' => 'image|file|max:1024',
            'prize' => 'required|max:255',
            'time' => 'required|max:255',
            'slot' => 'required|max:255',
            'location' => 'required|max:255',
            'body' => 'required'
            // 'registrationDate' => 'required|max:255',
            // 'matchDate' => 'required|max:255',
            // 'matchAndDate' => 'required|max:255',
        ];

        if ($request->slug != $tournament->slug) {
            $rules['slug'] = 'required|unique:tournaments';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('tournament-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Tournament::where('id', $tournament->id)
            ->update($validatedData);

        return redirect('/dashboard/tournaments')->with('success', 'TURNAMEN BERHASIL DIUBAH');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        if ($tournament->image) {
            Storage::delete($tournament->image);
        }

        Tournament::destroy($tournament->id);
        Schedule::where('tournament_id', $tournament->id)->delete();
        Standing::where('tournament_id', $tournament->id)->delete();
        Team::where('tournament_id', $tournament->id)->delete();
        Result::where('tournament_id', $tournament->id)->delete();

        return redirect('/dashboard/tournaments')->with('error', 'TURNAMEN DIHAPUS');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Tournament::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
