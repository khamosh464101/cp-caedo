<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\Admin\TeamRequest;

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

        if ($request->hasfile('avatar')) {
            $get_file = $request->file('avatar')->store('images/team');
            $team_data['avatar'] = $get_file;
        }

        if ($request->hasfile('file')) {
            $get_file = $request->file('file')->store('pdfs/team');
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

        if ($request->hasfile('avatar')) {
            $get_file = $request->file('avatar')->store('images/posts');
            $team_data['avatar'] = $get_file;
        }

        if ($request->hasfile('file')) {
            $get_file = $request->file('file')->store('pdfs/team');
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
