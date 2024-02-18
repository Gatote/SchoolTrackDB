<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function () {
    if (Auth::check()) {
        return view('home');
    } else {
        return redirect('/');
    }
})->name('home');

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
});