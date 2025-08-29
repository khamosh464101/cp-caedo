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
            // Get the file from the request
            $file = $request->file('file');
            
            // Generate the new file name
            $new_file_name = $this->generateFileName($file);
            
            // Store the file with the new name
            $get_file = $file->storeAs('pdfs/vacancy', $new_file_name);
            
            // Add the file path to the vacancy data
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
        // Get the request data excluding the 'file' field
        $vacancy_data = $request->safe()->except('file');
    
        if ($request->hasfile('file')) {
            // Get the file from the request
            $file = $request->file('file');
            
            // Generate the new file name
            $new_file_name = $this->generateFileName($file);
            
            // Store the file with the new name
            $get_file = $file->storeAs('pdfs/vacancy', $new_file_name);
            
            // Add the file path to the vacancy data
            $vacancy_data['file'] = $get_file;
        }
    
        // Update the vacancy with the new data
        $vacancy->update($vacancy_data);
    
        // Redirect with a success message
        return to_route('admin.vacancy.index')->with('message', trans('admin.vacancy_updated'));
    }
    
    public function generateFileName($file)
    {
        // Get the original file name (without extension)
        $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
        // Get the current timestamp in 'yy-m-d-H-i-s' format
        $timestamp = now()->format('y-m-d-H-i-s');
        
        // Create the new file name with the timestamp
        return $file_name . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
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
