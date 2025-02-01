<?php

use App\Models\Post;
use App\Mail\NewEmail;
use App\Models\Thread;
use App\View\Components\AppLayout;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgetPasswordController;

// Route::get('/', function () {
//     // $posts = [];
//     // if(auth()->check()) {
//     //     $posts = auth()->user()->userPosts()->latest()->get();
//     // }
//     // $posts = Post::latest()->get();
//     // $user = auth()->user();

//     return view('layouts.app', ['slot' => view('home')]);
// });

// auth routes
// Route::get('/auth/login', function() {
//     return view('auth.login');
// })->name('login');

// Route::get('/auth/register', function() {
//     return view('auth.register');
// });

// Route::post('/register', [UserController::class, 'register'])->name('register');
// Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/', function () {
    $threads = Thread::latest()->get();

    return view('home', ['threads' => $threads]);
});

// password reset routes
Route::get('password/reset', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// thread routes
Route::get('/create-thread', function() {
    return view('create-thread');
});
Route::post('/create-thread', [ThreadController::class, 'createThread']);
Route::get('/threads', [ThreadController::class, 'showThreads']);
// Route::get('/edit-thread/{thread}', [ThreadController::class, 'showEditScreen']);
Route::get('/thread/{thread}', [ThreadController::class, 'showThread']);
Route::put('/edit-thread/{thread}', [ThreadController::class, 'updateThread']);
Route::delete('/delete-thread/{thread}', [ThreadController::class, 'deleteThread']);
Route::post('/upload', [ThreadController::class, 'uploadImage'])->name('threads.upload');

// 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/testroute', function() {
    $name = "Daniel";
    Mail::to('tisiooagptxjiynylr@hthlm.com')->send(new NewEmail($name));
});
