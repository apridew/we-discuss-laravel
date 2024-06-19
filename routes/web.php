<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::namespace('App\Http\Controllers')->group(function () {
        Route::resource('discussions', DiscussionController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
    });
    
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::resource('discussions', DiscussionController::class)
        ->only(['index', 'show']);
    
    Route::get('discussions/categories/{category}', 'CategoryController@show')
        ->name('discussions.categories.show');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('login', 'LoginController@show')->name('auth.login.show');
    Route::post('login', 'LoginController@login')->name('auth.login.login');
    Route::post('logout', 'LoginController@logout')->name('auth.login.logout');
    Route::get('signup', 'SignUpController@show')->name('auth.signup.show');
    Route::post('signup', 'SignUpController@signup')->name('auth.signup.signup');
});

Route::get('answers/1', function () {
    return view('pages.answers.form');
})->name('answers.edit');

Route::get('users/apridew', function () {
    return view('pages.users.show');
})->name('users.show');

Route::get('users/apridew/edit', function () {
    return view('pages.users.form');
})->name('users.edit');
