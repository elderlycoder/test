<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Models\Post;


Route::get('/', function () {
    return view ('welcome');
});

Route::get('posts', function () {
    $post = Post::find(1);
    return view('posts', ['post'=>$post]);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('category', 'Admin\CategoryController');
});
