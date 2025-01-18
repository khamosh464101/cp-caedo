<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Traits\ApiResponse;

class ApiTagController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $tags = Tag::get();

        return $this->retrieveResponse(data: TagResource::collection($tags));
    }
}
