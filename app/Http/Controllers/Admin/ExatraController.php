<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exatra;
use App\Http\Requests\Admin\ExatraRequest;

class ExatraController extends Controller
{
    public function index()
    {
        $exatras = Exatra::latest()->paginate(15);
        return view('admin.exatra.index', compact('exatras'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Exatra::categories;

        return view('admin.exatra.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExatraRequest $request)
    {
        $exatra_data = $request->safe()->except(['icon']);

        if ($request->hasfile('icon')) {
            $get_file = $request->file('icon')->store('icons/exatra');
            $exatra_data['icon'] = $get_file;
        }

        $exatra = Exatra::create($exatra_data);

        return to_route('admin.exatra.index')->with('message', trans('admin.exatra_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exatra $exatra)
    {
        $categories = Exatra::categories;

        return view('admin.exatra.edit', compact('exatra', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExatraRequest $request, Exatra $exatra)
    {
        $exatra_data = $request->safe()->except(['icon']);

        if ($request->hasfile('icon')) {
            $get_file = $request->file('icon')->store('icons/exatra');
            $exatra_data['icon'] = $get_file;
        }

        $exatra->update($exatra_data);

        return to_route('admin.exatra.index')->with('message', trans('admin.exatra_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exatra $exatra)
    {
        $exatra->delete();

        return back()->with('message', trans('admin.exatra_deleted'));
    }
}
