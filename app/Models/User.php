<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * add relations with Post table
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'commentator_id');
    }

    public static function getUsersWithPosts(int $limit)
    {
        $data = User::
            with(["posts" => function($query) {
                // todo задач 6.3
                $query->withCount('comments')->orderBy('comments_count', 'desc')->get();
            }])
            ->select('users.*')
            ->where('users.active', true)
            ->from('users')
            ->get();

        // todo задача 6.1
        if ($limit > 0) {
            $data = $data->map(function($feed) use ($limit) {
                return $feed->setRelation('posts', $feed->posts->take($limit));
            });
        }

        return $data;
    }
}
