<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

// Categories
Route::get('/categories', [
    CategoryController::class, 'index'
])->name('categories.index');

Route::get('/categories/create', [
    CategoryController::class, 'create'
])->name('categories.create');

Route::post('/categories', [
    CategoryController::class, 'store'
])->name('categories.store');

Route::get('/categories/{category}', [
    CategoryController::class, 'show'
])->name('categories.show');

Route::get('/categories/{category}/edit', [
    CategoryController::class, 'edit'
])->name('categories.edit');

Route::put('/categories/{category}', [
    CategoryController::class, 'update'
])->name('categories.update');

Route::delete('/categories/thumbnail/{category}', [
    CategoryController::class, 'removeThumbnail'
])->name('categories.delete.thumbnail');

Route::delete('/categories/{category}', [
    CategoryController::class, 'destroy'
])->name('categories.destroy');

// Posts
Route::get('/posts', [
    PostController::class, 'index'
])->name('posts.index');

Route::get('/posts/create', [
    PostController::class, 'create'
])->name('posts.create');

Route::post('/posts', [
    PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{post}', [
    PostController::class, 'show'
])->name('posts.show');

Route::get('/posts/{post}/edit', [
    PostController::class, 'edit'
])->name('posts.edit');

Route::put('/posts/{post}', [
    PostController::class, 'update'
])->name('posts.update');

Route::delete('/posts/thumbnail/{category}', [
    PostController::class, 'removeThumbnail'
])->name('posts.delete.thumbnail');

Route::delete('/posts/{post}', [
    PostController::class, 'destroy'
])->name('posts.destroy');

// Subscription
Route::post('categories/{category}/subscriptions', [
    SubscriptionController::class, 'store'
])->name('categories.subscriptions.store');

Route::delete('categories/{category}/subscriptions', [
    SubscriptionController::class, 'destroy'
])->name('categories.subscriptions.destroy');

//Subscribers
Route::post('subscribe', [
        SubscribeController::class, 'store'
])->name('subscribe.store');

// Favorite
Route::post('favorites/{post}/posts', [
    FavoriteController::class, 'store'
])->name('posts.store.favorites');

Route::delete('favorites/{post}/posts', [
    FavoriteController::class, 'destroy'
])->name('posts.destroy.favorites');

// Comment
Route::post('/comments/{post}/posts', [
    CommentController::class, 'store'
])->name('posts.store.comment');

Route::put('/comments/{comment}', [
    CommentController::class, 'update'
])->name('posts.update.comment');

Route::delete('/comments/{comment}', [
    CommentController::class, 'destroy'
])->name('posts.destroy.comment');
