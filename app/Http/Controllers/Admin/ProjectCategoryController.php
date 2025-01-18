<?php

namespace App\Http\Controllers\Admin;

use App\Traits\SlugCreater;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategoryRequest;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    use SlugCreater;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProjectCategory::with('user:id,name')->get();

        return view('admin.project_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectCategoryRequest $request)
    {
        ProjectCategory::create($request->validated());

        return to_route('admin.pcategory.index')->with('message', trans('admin.category_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $projectCategory)
    {
    
        $category = ProjectCategory::find($projectCategory);
        return view('admin.project_category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectCategoryRequest $request, ProjectCategory $pcategory)
    {
        $pcategory->update($request->validated());

        return to_route('admin.pcategory.index')->with('message',  trans('admin.category_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectCategory $pcategory)
    {
        $pcategory->delete();

        return to_route('admin.pcategory.index')->with('message', trans('admin.category_deleted'));
    }

    public function getSlug(Request $request)
    {
        $slug = $this->createSlug($request, ProjectCategory::class);
        

        return response()->json(['slug' => $slug]);
    }
}
