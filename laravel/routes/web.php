<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->get('/users', function () {
    $users = \App\Models\Users::all();
    return view('all-users', compact('users'));
});

Route::get('/users/add', function (){
    return view('new-user-form');
})->name('create-user');

Route::get('/submit/add', [\App\Http\Controllers\UserController::class, 'createUser'])->name('create-user-submit');


Route::get('/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('delete-user');

require __DIR__.'/auth.php';
