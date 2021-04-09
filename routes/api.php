<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/blogs', [BlogController::class, 'index']);
Route::post('/create-blog', [BlogController::class, 'create']);
Route::get('/blog/{blog:id}', [BlogController::class, 'getDataById']);
Route::put('/edit-blog/{blog:id}', [BlogController::class, 'edit']);
Route::delete('/delete-blog/{blog:id}', [BlogController::class, 'delete']);
Route::post('/search-blog', [BlogController::class, 'search']);
