<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResourse;
use App\Models\Project;

use App\Traits\ApiResponse;

class ProjectController extends Controller
{
    use ApiResponse;

    public function index($slug = null)
    {
     
        $projects = Project::with(['user:id,name', 'category:id,name'])
        ->when($slug, function ($query) use ($slug) {  
            $query->whereHas('category', function ($query) use ($slug) {  
                $query->where('slug', $slug);  
            });  
        })->whereStatus(true)->orderByDesc('id')->paginate(6);

        return $this->retrieveResponse(data: ProjectResourse::collection($projects));
    }

    public function show($id)
    {
        $project = Project::with(['user:id,name', 'category:id,name'])->whereSlug($id)->whereStatus(true)->firstOrFail();

        return $this->retrieveResponse(data: ProjectResourse::make($project));
    }


}
