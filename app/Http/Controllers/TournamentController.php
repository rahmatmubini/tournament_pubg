<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Point;
use App\Models\Tournament;
use App\Models\Game;
use App\Models\Hastag;
use App\Models\Team;
use App\Models\Result;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\ArrayItem;

class TournamentController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('game')) {
            $game = Game::firstWhere('slug', request('game'));
            $title = ' in ' . $game->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' By : ' . $author->name;
        }

        return view('tournaments', [
            "title" => "All tournaments" . $title,
            "active" => "tournaments",
            "tournaments" => Tournament::latest()->filter(request(['search', 'game', 'author']))->paginate(7)->withQueryString(),
            "slot" => Team::all()
        ]);
    }

    public function show(Tournament $tournament)
    {
        $point = Point::where('tournament_id', $tournament->id)->get();
        return view(
            'tournament.tournament',
            [
                "title" => "Single tournament",
                "active" => "tournaments",
                "tournament" => $tournament,
                "p" => Point::where('tournament_id', $tournament->id)->first(),
                "hastags" => Hastag::where('tournament_id', $tournament->id)->get(),
                "slot" => $tournament->teams->where('tournament_id', $tournament->id)->count()
            ]
        );
    }

    public function indexRegister(Tournament $tournament)
    {
        $results = DB::table('teams')
            ->select('tournament_id', 'user_id')
            ->where('teams.tournament_id', '=', $tournament->id)
            ->where('teams.user_id', '=', Auth::user()->id)->get();
        $slot = $tournament->teams->where('tournament_id', $tournament->id)->count();
        if ($slot == $tournament->slot) {
            return redirect('/' . 'tournaments/' . $tournament->slug)->with('success', 'TIM YANG TERDAFRAT SUDAH PENUH');
        } else {
            if (!empty($results[0])) {
                return redirect('/dashboard/teams')->with('success', 'KAMU SUDAH TERDAFTAR PADA TURNAMEN INI');
            } else {
                return view(
                    'registerTeam.index',
                    [
                        "title" => "Register tournament",
                        "active" => "tournaments",
                        "tournament" => $tournament
                    ]
                );
            }
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tournament_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|unique:teams',
            'email' => 'required|email|unique:teams',
            'nomor' => 'required|unique:teams',
            'image' => 'image|file|max:1024',
            'player1' => ['required', 'min:4', 'unique:teams'],
            'player2' => ['required', 'min:4', 'unique:teams'],
            'player3' => ['required', 'min:4', 'unique:teams'],
            'player4' => ['required', 'min:4', 'unique:teams'],
            'idPlayer1' => ['required', 'min:4', 'unique:teams', 'numeric'],
            'idPlayer2' => ['required', 'min:4', 'unique:teams', 'numeric'],
            'idPlayer3' => ['required', 'min:4', 'unique:teams', 'numeric'],
            'idPlayer4' => ['required', 'min:4', 'unique:teams', 'numeric']
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('team-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Team::create($validatedData);

        return redirect('/dashboard/teams')->with('success', 'BERHASIL MENDAFTARAKAN TIM');
    }

    public function team(Tournament $tournament)
    {
        // $team = DB::table('teams')
        //     ->select('name')
        //     ->where('teams.tournament_id', '=', $tournament->id)->get();

        return view(
            'tournament.team',
            [
                "title" => "Single tournament",
                "active" => "tournaments",
                "tournament" => $tournament,
                "slot" => $tournament->teams->where('tournament_id', $tournament->id)->count(),
                "teams" => $tournament->teams
            ]
        );
    }

    public function schedule(Tournament $tournament)
    {
        return view(
            'tournament.schedule',
            [
                "title" => "Single tournament",
                "active" => "tournaments",
                "tournament" => $tournament,
                "schedules" => $tournament->schedules,
                "slot" => $tournament->teams->where('tournament_id', $tournament->id)->count()
            ]
        );
    }

    public function result(Tournament $tournament, Schedule $schedule)
    {
        return view(
            'tournament.result',
            [
                "title" => "Single tournament",
                "active" => "tournaments",
                "tournament" => $tournament,
                "schedule" => $schedule,
                "results" => Result::where('schedule_id', $schedule->id)->orderByRaw('rankPoint + killPoint DESC')->get(),
                "slot" => $tournament->teams->where('tournament_id', $tournament->id)->count()
            ]
        );
    }

    public function standing(Tournament $tournament)
    {
        return view(
            'tournament.standing',
            [
                "title" => "Single tournament",
                "active" => "tournaments",
                "tournament" => $tournament,
                "teams" => Team::where('tournament_id', $tournament->id)->get(),
                "results" => DB::table('results')
                    ->select('team_id', DB::raw('SUM(killPoint + rankPoint) as total'), DB::raw('SUM(killPoint) as totalkill'), DB::raw('SUM(rankPoint) as totalrank'))
                    ->groupBy('team_id')
                    ->orderByDesc(DB::raw('SUM(killPoint + rankPoint)'))
                    ->get(),
                "slot" => $tournament->teams->where('tournament_id', $tournament->id)->count(),
            ]
        );
    }
}
