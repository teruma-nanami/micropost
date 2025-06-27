<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TweetController::class, 'index'])->name('home');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('/tweets/create', [TweetController::class, 'create'])->name('tweets.create');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::get('/tweets/{tweet}/edit', [TweetController::class, 'edit'])->name('tweets.edit');
    Route::put('/tweets/{tweet}', [TweetController::class, 'update'])->name('tweets.update');
    Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy');
    Route::get('/mypage', [UserController::class, 'index'])->name('mypage');
    Route::post('/tweets/{id}/like', [LikeController::class, 'like'])->name('tweets.like');
    Route::delete('/tweets/{id}/unlike', [LikeController::class, 'unlike'])->name('tweets.unlike');
    Route::post('/users/{id}/follow', [UserController::class, 'store'])->name('users.follow');
    Route::delete('/users/{id}/unfollow', [UserController::class, 'destroy'])->name('users.unfollow');
});
