<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAuthUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
// Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
// Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
// Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
// Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
// Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
// Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Route::resource('tasks', TaskController::class)->middleware('auth');

// Route::resource('tasks', TaskController::class)->middleware(isAuthUser::class);
Route::resource('tasks', TaskController::class)->middleware('isAuth');
Route::patch('tasks/{task}', [TaskController::class, 'updateCompleted'])
                                        ->name('tasks.update.completed')
                                        ->middleware('isAuth');

Route::get('/login', [UserController::class, 'loginForm'])->name('login.form');
Route::get('/signup', [UserController::class, 'signupForm'])->name('signup.form');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');