<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Category;
use App\Traits\ApiResponse;

class ApiPostController extends Controller
{
    use ApiResponse;

    public function index($type =null, $slug = null)
    {

        $posts = Post::with(['user:id,name', 'category:id,name', 'tags:id,name'])
        ->when($type === 'category', function ($query) use ($slug) {  
            $query->whereHas('category', function ($query) use ($slug) {  
                $query->where('slug', $slug);  
            });  
        })->when($type === 'tag', function ($query) use ($slug) {  
            $query->whereHas('tags', function ($query) use ($slug) {  
                $query->where('name', $slug);  
            });  
        })->whereStatus(true)->orderByDesc('id')->paginate(3);

        return $this->retrieveResponse(data: PostResource::collection($posts));
    }

    public function show($id)
    {
        $post = Post::with(['user:id,name', 'category:id,name', 'tags:id,name', 'comments.user'])->whereSlug($id)->whereStatus(true)->firstOrFail();

        return $this->retrieveResponse(data: PostResource::make($post));
    }


}
