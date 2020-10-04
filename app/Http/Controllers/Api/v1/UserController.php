<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = (int) $request->get('posts_limit', 100);

        $data = User::where('active', true)->get();

        if ($limit > 0) {
            $data = $data->map(function($feed) use ($limit) {
                return $feed->setRelation('posts', $feed->posts->take($limit));
            });
        }

        return new \App\Http\Resources\UserCollection($data);
    }
}
