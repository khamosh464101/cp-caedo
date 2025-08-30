<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procurement;
use App\Http\Requests\Admin\ProcurementRequest;
use App\Http\Controllers\Admin\VacancyController;

class ProcurementController extends Controller
{
    public function index()
    {
        $procurements = Procurement::latest()->paginate(15);
        return view('admin.procurement.index', compact('procurements'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.procurement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcurementRequest $request)
    {
        $procurement_data = $request->safe()->except('file');
        $vc = new VacancyController;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('pdfs/procurement', $new_file_name);
            $procurement_data['file'] = $get_file;
        }

        $procurement = Procurement::create($procurement_data);

        return to_route('admin.procurement.index')->with('message', trans('admin.procurement_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Procurement $procurement)
    {
        return view('admin.procurement.edit', compact('procurement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProcurementRequest $request, Procurement $procurement)
    {
        $procurement_data = $request->safe()->except('file');
        $vc = new VacancyController;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('pdfs/procurement', $new_file_name);
            $procurement_data['file'] = $get_file;
        }

        $procurement->update($procurement_data);
        return to_route('admin.procurement.index')->with('message', trans('admin.procurement_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procurement $procurement)
    {
        $procurement->delete();
        return back()->with('message', trans('admin.procurement_deleted'));
    }
}
