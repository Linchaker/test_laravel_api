<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'post_id' => $this->post_id,
            'commentator_id' => $this->commentator_id,
            'content' => $this->content,
            'created_at_ts' => $this->created_at->timestamp,
            // todo задача 7.2.1
            'posts' => (new CommentPostResource($this->posts)),
        ];
    }
}
