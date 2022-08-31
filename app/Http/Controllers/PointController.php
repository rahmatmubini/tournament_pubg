<?php

namespace App\Http\Controllers;

use App\Models\Hastag;
use App\Models\Point;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Validation\Rule;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tournament $tournament)
    {
        return view('dashboard.admin.point.create', [
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
            'kill' => 'required|numeric|digits_between:1,2',
        ]);

        $validatedData['tournament_id'] = $tournament->id;


        $team = $tournament->point()->create($validatedData);
        return redirect('/dashboard/tournaments/' . $tournament->slug)->with('success', 'Registration successful!');
    }

    public function storeHastag(Request $request, Tournament $tournament)
    {
        foreach ($request->hastag as $key => $hastag) {
            $data = new Hastag();
            $data->hastag = $hastag;
            $data->nomor = $request->nomor[$key];
            $data->tournament_id = $request->tournament_id[$key];
            $data->point_id = $request->point_id[$key];
            $data->save();
        }
        return redirect('/dashboard/tournaments/' . $tournament->slug)->with('success', 'Registration successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament, Point $point)
    {
        if ($point->tournament_id != $tournament->id) {
            abort(404);
        }
        $point->load('tournament');
        return view('dashboard.admin.point.edit', compact('tournament', 'point'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament, Point $point)
    {
        $rules = [
            'tournament_id' => 'required',
            'kill' => 'required|numeric|digits_between:1,2',
            'hastag1' => 'required|numeric|digits_between:1,2',
            'hastag2' => 'required|numeric|digits_between:1,2',
            'hastag3' => 'required|numeric|digits_between:1,2',
            'hastag4' => 'required|numeric|digits_between:1,2',
            'hastag5' => 'required|numeric|digits_between:1,2',
            'hastag6' => 'required|numeric|digits_between:1,2',
            'hastag7' => 'required|numeric|digits_between:1,2',
            'hastag8' => 'required|numeric|digits_between:1,2',
            'hastag9' => 'required|numeric|digits_between:1,2',
            'hastag10' => 'required|numeric|digits_between:1,2',
            'hastag11' => 'required|numeric|digits_between:1,2',
            'hastag12' => 'required|numeric|digits_between:1,2',
            'hastag13' => 'required|numeric|digits_between:1,2',
            'hastag14' => 'required|numeric|digits_between:1,2',
            'hastag15' => 'required|numeric|digits_between:1,2',
            'hastag16' => 'required|numeric|digits_between:1,2',
            'hastag17' => 'required|numeric|digits_between:1,2',
            'hastag18' => 'required|numeric|digits_between:1,2',
            'hastag19' => 'required|numeric|digits_between:1,2',
            'hastag20' => 'required|numeric|digits_between:1,2',
            'hastag21' => 'required|numeric|digits_between:1,2',
            'hastag22' => 'required|numeric|digits_between:1,2',
            'hastag23' => 'required|numeric|digits_between:1,2',
            'hastag24' => 'required|numeric|digits_between:1,2',
            'hastag25' => 'required|numeric|digits_between:1,2'
        ];

        $validatedData = $request->validate($rules);
        Point::where('id', $point->id)
            ->update($validatedData);
        return redirect('/dashboard/tournaments/' . $tournament->slug)->with('success', 'Team has been updated! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament, Point $point)
    {
        $point->delete();
        Hastag::where('tournament_id', $tournament->id)->delete();
        return redirect('/dashboard/tournaments/' . $tournament->slug)->with('success', 'Team has been leaved! ');
    }
}
