<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'created_at_ts' => $this->created_at->timestamp,
            'image_url' => $this->image->url,
            // todo задача 6.2
            'count_of_comments' => $this->comments->count(),
        ];
    }
}
