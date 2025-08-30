<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ResearchRequest;
use App\Http\Controllers\Admin\VacancyController;

class ResearchController extends Controller
{
    public function index()
    {
        $researchs = Research::latest()->paginate(15);
        return view('admin.research.index', compact('researchs'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.research.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResearchRequest $request)
    {
        $data = $request->safe()->except(['file']);
        $vc = new VacancyController;
        if ($request->hasfile('pdf')) {
            $file = $request->file('pdf');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('pdfs/research', $new_file_name);
            $data['pdf'] = $get_file;
        }

        $research = Research::create($data);

        return to_route('admin.research.index')->with('message', trans('admin.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $research)
    {
        return view('admin.research.edit', compact('research'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResearchRequest $request, Research $research)
    {
     
        $data = $request->safe()->except(['file']);
        $vc = new VacancyController;
        if ($request->hasfile('pdf')) {
            $file = $request->file('pdf');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('pdfs/research', $new_file_name);
            $data['pdf'] = $get_file;
        }


        $research->update($data);

        return to_route('admin.research.index')->with('message', trans('admin.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $research)
    {
        $research->delete();

        return back()->with('message', trans('admin.deleted'));
    }
}
