<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Http\Requests\Admin\VacancyRequest;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::latest()->paginate(15);
        return view('admin.vacancy.index', compact('vacancies'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacancyRequest $request)
    {
        $vacancy_data = $request->safe()->except('file');

        if ($request->hasfile('file')) {
            $get_file = $request->file('file')->store('pdfs/vacancy');
            $vacancy_data['file'] = $get_file;
        }

        $vacancy = Vacancy::create($vacancy_data);

        return to_route('admin.vacancy.index')->with('message', trans('admin.vacancy_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        return view('admin.vacancy.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VacancyRequest $request, Vacancy $vacancy)
    {
        $vacancy_data = $request->safe()->except('file');

        if ($request->hasfile('file')) {
            $get_file = $request->file('file')->store('pdfs/vacancy');
            $vacancy_data['file'] = $get_file;
        }

        $vacancy->update($vacancy_data);
        return to_route('admin.vacancy.index')->with('message', trans('admin.vacancy_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return back()->with('message', trans('admin.vacancy_deleted'));
    }
}
