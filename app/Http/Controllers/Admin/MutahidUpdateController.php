<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MutahidUpdate;
use App\Http\Requests\Admin\MutahidUpdateRequest;

class MutahidUpdateController extends Controller
{
    public function index()
    {
        $mutahids = MutahidUpdate::latest()->paginate(15);
        return view('admin.mutahid.index', compact('mutahids'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.mutahid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MutahidUpdateRequest $request)
    {
        $mu_data = $request->safe()->except(['file', 'image']);

        if ($request->hasfile('file')) {
            $get_file = $request->file('file')->store('pdfs/mutahid');
            $mu_data['file'] = $get_file;
        }

        if ($request->hasfile('image')) {
            $get_file = $request->file('image')->store('pdfs/mutahid');
            $mu_data['image'] = $get_file;
        }

        $mutahid = MutahidUpdate::create($mu_data);

        return to_route('admin.mutahid.index')->with('message', trans('admin.mutahid_update_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MutahidUpdate $mutahid)
    {
        return view('admin.mutahid.edit', compact('mutahid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MutahidUpdateRequest $request, MutahidUpdate $mutahid)
    {
     
        $mutahid_data = $request->safe()->except(['file', 'image']);

        if ($request->hasfile('file')) {
            $get_file = $request->file('file')->store('pdfs/mutahid');
            $mutahid_data['file'] = $get_file;
        }

        if ($request->hasfile('image')) {
            $get_file = $request->file('image')->store('pdfs/mutahid');
            $mutahid_data['image'] = $get_file;
        }

        $mutahid->update($mutahid_data);

        return to_route('admin.mutahid.index')->with('message', trans('admin.mutahid_update_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MutahidUpdate $mutahid)
    {
        $mutahid->delete();

        return back()->with('message', trans('admin.mutahid_update_deleted'));
    }
}
