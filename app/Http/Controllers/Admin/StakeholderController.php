<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stakeholder;
use App\Http\Requests\Admin\StakeholderRequest;

class StakeholderController extends Controller
{
    public function index()
    {
        $stakeholders = Stakeholder::latest()->paginate(15);
        return view('admin.stakeholder.index', compact('stakeholders'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Stakeholder::categories;

        return view('admin.stakeholder.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StakeholderRequest $request)
    {
        $stakeholder_data = $request->safe()->except(['image']);

        if ($request->hasfile('image')) {
            $get_file = $request->file('image')->store('images/stakeholder');
            $stakeholder_data['image'] = $get_file;
        }

        $stakeholder = Stakeholder::create($stakeholder_data);

        return to_route('admin.stakeholder.index')->with('message', trans('admin.stakeholder_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stakeholder $stakeholder)
    {
        $categories = Stakeholder::categories;

        return view('admin.stakeholder.edit', compact('stakeholder', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StakeholderRequest $request, Stakeholder $stakeholder)
    {
        $stakeholder_data = $request->safe()->except(['image']);

        if ($request->hasfile('image')) {
            $get_file = $request->file('image')->store('images/stakeholder');
            $stakeholder_data['image'] = $get_file;
        }

        $stakeholder->update($stakeholder_data);

        return to_route('admin.stakeholder.index')->with('message', trans('admin.stakeholder_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stakeholder $stakeholder)
    {
        $stakeholder->delete();

        return back()->with('message', trans('admin.stakeholder_deleted'));
    }
}
