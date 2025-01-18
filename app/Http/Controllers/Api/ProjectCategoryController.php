<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\ProjectCategory;
use App\Traits\ApiResponse;

class ProjectCategoryController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $categories = ProjectCategory::get();

        return $this->retrieveResponse(data: CategoryResource::collection($categories));
    }

    public function show($id)
    {
        $category = ProjectCategory::with('projects')->whereId($id)->firstOrFail();

        return $this->retrieveResponse(data: CategoryResource::make($category));
    }
}
