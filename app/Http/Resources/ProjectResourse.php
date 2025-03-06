<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $routeShowPost = $request->routeIs('projects.show');

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'thumpnail1' => $this->thumpnail1,
            'thumpnail2' => $this->thumpnail2,
            'tp' => $this->tp,
            'slug' => $this->slug,
            'date' => $this->date,
            'created_at' => $this->created_at,
            $this->mergeWhen($routeShowPost, [
                'content' => $this->content
            ]),
            'user' => UserResource::make($this->whenLoaded('user')),
            'category' => GeneralResource::make($this->whenLoaded('category')),
        ];
    }
}
