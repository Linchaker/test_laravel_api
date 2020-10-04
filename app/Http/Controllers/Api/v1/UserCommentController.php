<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class UserCommentController extends Controller
{
    /**
     * @param $user_id
     * @return CommentResource
     */
    public function show($user_id)
    {
        return CommentResource::collection(Comment::getCommentsByUser($user_id));
    }

}
