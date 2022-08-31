<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminGameController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StandingController;
use App\Models\Game;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardTournamentController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\DashboardTeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/contoh', function () {
    return view('contoh', [
        "title" => "contoh",
        "active" => "contoh"
    ]);
});

Route::get('/', function () {
    return redirect('/tournaments');
    // return view('home', [
    //     "title" => "Home",
    //     "active" => "home"
    // ]);
});

Route::get('/community', function () {
    return view('community', [
        "title" => "Community",
        "active" => "community",
        "name" => "Rahmat Mubini Nur Sujudi",
        "email" => "rahmat.mubini12@gmail.com",
        "image" => "profile.jpg"
    ]);
});

Route::get('/tournaments', [TournamentController::class, 'index']);
Route::get('/tournaments/{tournament:slug}', [TournamentController::class, 'show']);
Route::get('/tournaments/{tournament:slug}/team', [TournamentController::class, 'team']);
Route::get('/tournaments/{tournament:slug}/schedule', [TournamentController::class, 'Schedule']);
Route::get('/tournaments/{tournament:slug}/schedule/{schedule}', [TournamentController::class, 'result']);

Route::get('/tournaments/{tournament:slug}/standing', [TournamentController::class, 'standing']);
// IsRegistTeam
Route::get('/tournaments/{tournament:slug}/register', [TournamentController::class, 'indexRegister'])->middleware('auth');
Route::post('/tournaments/{tournament:slug}/register/store', [TournamentController::class, 'store'])->middleware('auth');



Route::get('/games', function () {
    return view('games', [
        'title' => 'Tournament Games',
        'active' => 'games',
        'games' => Game::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/profile', [LoginController::class, 'profile'])->middleware('auth');
Route::put('/profile/edit', [LoginController::class, 'edit'])->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/certificate', [LoginController::class, 'certi']);
Route::get('/certificate/{certificate:id}', [LoginController::class, 'show']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        "title" => "Dashboard"
    ]);
})->middleware('auth');

Route::get('/dashboard/tournaments/checkSlug', [DashboardTournamentController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/tournaments', DashboardTournamentController::class)->middleware('auth');


// Route::resource('/dashboard/tournaments/{tournament:slug}/teams', TeamController::class)->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/dashboard/tournaments.point', PointController::class);
    Route::post('/dashboard/tournaments/{tournament}/hastag', [PointController::class, 'storeHastag']);

    Route::get('/dashboard/tournaments/{tournament}/teams/checkSlug', [TeamController::class, 'checkSlug']);
    Route::resource('/dashboard/tournaments.teams', TeamController::class);

    Route::get('/dashboard/tournaments/{tournament}/schedules/checkSlug', [ScheduleController::class, 'checkSlug']);
    Route::resource('/dashboard/tournaments.schedules', ScheduleController::class);
    Route::get('/dashboard/tournaments/{tournament}/schedules/{schedule}/create', [ScheduleController::class, 'resultCreate']);
    Route::post('/dashboard/tournaments/{tournament}/schedules/{schedule}', [ScheduleController::class, 'resultStore']);
    Route::delete('/dashboard/tournaments/{tournament}/schedules/{schedule}/{result:id}', [ScheduleController::class, 'deleteResult']);

    Route::get('/dashboard/tournaments/{tournament}/standing/checkSlug', [StandingController::class, 'checkSlug']);
    Route::resource('/dashboard/tournaments.standings', StandingController::class);

    Route::get('/dashboard/tournaments/{tournament}/standing/sendiri', [StandingController::class, 'sendiri']);
    Route::post('/dashboard/tournaments/{tournament}/standing/sendiri/store', [StandingController::class, 'sendiriCreate']);

    Route::get('/dashboard/tournaments/{tournament}/standing/otomatis', [StandingController::class, 'otomatis']);
    Route::post('/dashboard/tournaments/{tournament}/standing/otomatis/store', [StandingController::class, 'otomatisCreate']);
});

Route::resource('/dashboard/teams', DashboardTeamController::class)->middleware('auth');
Route::get('/dashboard/teams/{team}/team', [DashboardTeamController::class, 'team'])->middleware('auth');
Route::get('/dashboard/teams/{team}/schedule', [DashboardTeamController::class, 'schedule'])->middleware('auth');
Route::get('/dashboard/teams/{team}/schedule/{schedule}', [DashboardTeamController::class, 'scheduleShow'])->middleware('auth');

Route::get('/dashboard/teams/{team}/standing', [DashboardTeamController::class, 'standing'])->middleware('auth');
Route::get('/dashboard/teams/{team}/standing/certi', [DashboardTeamController::class, 'certificate'])->middleware('auth');
Route::put('/dashboard/teams/{team}/standing/certi/edit', [DashboardTeamController::class, 'klaim'])->middleware('auth');

Route::resource('/dashboard/games', AdminGameController::class)->except('show')->middleware('admin');
