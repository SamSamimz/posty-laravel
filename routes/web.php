<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\PostController;
use Symfony\Component\CssSelector\Node\FunctionNode;
use App\Http\Controllers\Auth\{RegisterController,LoginController, LogoutController};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});


//____auth

//register
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

//__protected route {guest}
Route::middleware(['guest'])->group(function() {
    //login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

});

//__prtected route  {auth}
Route::middleware(['auth'])->group(function() {
    //__logout
    Route::get('/logout', LogoutController::class)->name('logout');

    ///__like 
    Route::post('/post/{post}/likes', [PostLikeController::class, 'store'])->name('posts.like');
    
    ///__unlike 
    Route::delete('/post/{post}/likes', [PostLikeController::class, 'delete'])->name('posts.like');
    
    //__post
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/posts', [PostController::class, 'store'])->name('posts');
    Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('post.delete');
    
    //__user post 
    Route::get('/posts/{user:id}/posts', [UserPostController::class, 'index'])->name('posts.user');
    
    //__Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

