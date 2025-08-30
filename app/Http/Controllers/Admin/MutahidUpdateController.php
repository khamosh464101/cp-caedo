<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MutahidUpdate;
use App\Http\Requests\Admin\MutahidUpdateRequest;
use App\Http\Controllers\Admin\VacancyController;

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
        $vc = new VacancyController;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('pdfs/mutahid', $new_file_name);
            $mu_data['file'] = $get_file;
        }

        if ($request->hasfile('image')) {
            // Get the file from the request
            $file = $request->file('image');
            // Generate the new file name
            $new_file_name = $vc->generateFileName($file);
            // Store the file with the new name
            $get_file = $file->storeAs('pdfs/mutahid', $new_file_name);
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
            $file = $request->file('file');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('pdfs/mutahid', $new_file_name);
            $mu_data['file'] = $get_file;
        }

        if ($request->hasfile('image')) {
            // Get the file from the request
            $file = $request->file('image');
            // Generate the new file name
            $new_file_name = $vc->generateFileName($file);
            // Store the file with the new name
            $get_file = $file->storeAs('pdfs/mutahid', $new_file_name);
            $mu_data['image'] = $get_file;
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
