<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/login', 'login');
Route::view('/signup', 'signup');
Route::view('/tasks', 'tasks');
Route::view('/tasks/create', 'add-task');
Route::view('/tasks/edit', 'edit-task');