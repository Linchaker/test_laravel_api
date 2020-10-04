<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentPostResource extends PostResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $post = parent::toArray($request);

        // show post author if active
        $post['author'] = $this->user->active ? $this->user->name : null;

        return $post;
    }
}
