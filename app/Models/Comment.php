<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
