<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Traits\SlugCreater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\VacancyController;

class ProjectController extends Controller
{
    use SlugCreater;

    public function __construct()
    {
        $this->authorizeResource(Project::class, 'project');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with(['category:id,name', 'user:id,name'])->latest()->paginate(15);

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = ProjectCategory::all();
        return view('admin.project.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        $project_data = $request->safe()->except(['image', 'thumpnail1', 'thumpnail2']);
        $vc = new VacancyController;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('images/projects', $new_file_name);
            $project_data['image'] = $get_file;
        }

        if ($request->hasfile('thumpnail1')) {
            $file = $request->file('thumpnail1');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('images/projects', $new_file_name);
            $project_data['thumpnail1'] = $get_file;
        }

        if ($request->hasfile('thumpnail2')) {
            $file = $request->file('thumpnail2');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('images/projects', $new_file_name);
            $project_data['thumpnail2'] = $get_file;
        }

        $project = Project::create($project_data);

        return to_route('admin.project.index')->with('message', trans('admin.project_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = ProjectCategory::all();
        return view('admin.project.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project_data = $request->safe()->except(['image', 'thumpnail1', 'thumpnail2']);
        $vc = new VacancyController;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('images/projects', $new_file_name);
            $project_data['image'] = $get_file;
        }

        if ($request->hasfile('thumpnail1')) {
            $file = $request->file('thumpnail1');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('images/projects', $new_file_name);
            $project_data['thumpnail1'] = $get_file;
        }

        if ($request->hasfile('thumpnail2')) {
            $file = $request->file('thumpnail2');
            $new_file_name = $vc->generateFileName($file);
            $get_file = $file->storeAs('images/projects', $new_file_name);
            $project_data['thumpnail2'] = $get_file;
        }

        $project->update($project_data);

        return to_route('admin.project.index')->with('message', trans('admin.project_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return back()->with('message', trans('admin.project_deleted'));
    }

    public function getSlug(Request $request)
    {
       
        $slug = $this->createSlug($request, Project::class);


        return response()->json(['slug' => $slug]);
    }

    public function search(Request $request)
    {
        $searched_text = $request->input('search');

        $projects = Project::query()->with(['category', 'user'])
            ->where('title', 'LIKE', "%{$searched_text}%")
            ->orWhere('content', 'LIKE', "%{$searched_text}%")
            ->paginate(10);

        // Return the search view with the resluts
        return view('admin.project.search', compact('projects'));
    }
}
