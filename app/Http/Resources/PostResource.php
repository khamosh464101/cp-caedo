<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        $routeShowPost = $request->routeIs('posts.show');

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'thumpnail1' => $this->thumpnail1,
            'thumpnail2' => $this->thumpnail2,
            'tp' => $this->tp,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'date' => $this->date,
            $this->mergeWhen($routeShowPost, [
                'content' => $this->content,
                'comments' => CommentResource::collection($this->whenLoaded('comments'))
            ]),
            'user' => UserResource::make($this->whenLoaded('user')),
            'category' => GeneralResource::make($this->whenLoaded('category')),
            'tags' => GeneralResource::collection($this->whenLoaded('tags')),
        ];
    }
}
