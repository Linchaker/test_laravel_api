<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'commentator_id');
    }

    public function posts()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    // todo задача 7.1
    public static function getCommentsByUser($user_id)
    {

        // first query
        $comments = DB::SELECT('
                         SELECT com.* FROM comments as com
                         JOIN posts ON posts.id = com.post_id
                         WHERE posts.image_id IS NOT NULL
                            AND com.commentator_id = ?
                         ORDER BY com.created_at DESC',
                        [$user_id]

        );

        // todo задача 7.2
        $comments = Comment::withTrashed()
            ->with(["posts" => function($query) {
                $query->whereNotNull('posts.image_id');
            }])
            ->select('comments.*')
            ->where('comments.commentator_id', $user_id)
            ->from('comments')
            ->latest()
            ->get();


        foreach ($comments as $comment) {
            if ($comment->posts !== null) {
                $comment->load('posts.image');
            }
        }


        return $comments;
    }
}
