<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * user api
 */
Route::apiResource('/users', 'Api\v1\UserController')->only('index');
/**
 * user-comments api
 */
Route::apiResource('/user-comments', 'Api\v1\UserCommentController')->only('show');
