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
        $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        $this->belongsTo('App\Models\Post');
    }

    // todo задача 7.1
    public static function getCommentsByUser($user_id)
    {

        $comments = DB::SELECT('
                         SELECT com.* FROM comments as com
                         LEFT JOIN posts ON posts.id = com.post_id
                         WHERE posts.image_id IS NOT NULL
                            AND com.commentator_id = ?
                         ORDER BY com.created_at DESC',
                        [$user_id]

        );

        return $comments;
    }
}
