<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\Admin\TeamRequest;
use App\Http\Controllers\Admin\VacancyController;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(15);
        return view('admin.team.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team_data = $request->safe()->except(['avatar', 'file']);
        $vc = new VacancyController;
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('images/team', $new_file_name);
            $team_data['avatar'] = $get_file;
        }

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('pdfs/team', $new_file_name);
            $team_data['file'] = $get_file;
        }

        $team = Team::create($team_data);

        return to_route('admin.team.index')->with('message', trans('admin.team_member_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        $team_data = $request->safe()->except(['image', 'file']);
        $vc = new VacancyController;
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('images/team', $new_file_name);
            $team_data['avatar'] = $get_file;
        }

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('pdfs/team', $new_file_name);
            $team_data['file'] = $get_file;
        }

        $team->update($team_data);

        return to_route('admin.team.index')->with('message', trans('admin.team_member_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return back()->with('message', trans('admin.team_team_deleted'));
    }
}
