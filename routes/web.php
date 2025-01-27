<?php

use App\Models\Post;
use App\Mail\NewEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgetPasswordController;

Route::get('/', function () {
    // $posts = [];
    // if(auth()->check()) {
    //     $posts = auth()->user()->userPosts()->latest()->get();
    // }
    $posts = Post::latest()->get();
    return view('layouts.app', ['posts' => $posts]);
});

// auth routes
// Route::get('/login', function() {
//     return view('login');
// });

Route::get('/auth/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/auth/register', function() {
    return view('auth.register');
});

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'login'])->name('login');

// password reset routes
Route::get('password/reset', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/testroute', function() {
    $name = "Daniel";
    Mail::to('tisiooagptxjiynylr@hthlm.com')->send(new NewEmail($name));
});

// blog routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
