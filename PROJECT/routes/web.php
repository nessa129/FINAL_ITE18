<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\View;


Route::get('/user/{id}', [ViewController::class, 'show'])->name('view');
Route::get('/user/{id}/edit', [ViewController::class, 'edit'])->name('edit');
Route::post('/user/{id}', [ViewController::class, 'update'])->name('update');

// Show login page
Route::get('/', function () {
    return view('login');
})->name('login.page');

// Registration route
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Login route
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');



// Home page with user data
Route::get('/home', function () {
    $user = Auth::user();
    return view('home', compact('user'));
})->middleware('auth')->name('home');


Route::get('/membership', function () {
    $user = Auth::user();
    return view('membership', compact('user'));
})->middleware('auth');


// Renewal page with user data
Route::get('/renew', function () {
    $user = Auth::user();
    return view('renew', compact('user'));
})->middleware('auth')->name('renew');


// Show user profile page
Route::get('/view', function () {
    $user = Auth::user(); // Get the currently authenticated user
    return view('view', compact('user')); // Pass user data to the view
})->middleware('auth')->name('view');


// Show the edit profile page
Route::get('/edit', function () {
    return view('edit', ['user' => Auth::user()]);
})->middleware('auth')->name('edit');

// Handle the update profile form submission
Route::post('/update', [ViewController::class, 'update'])->middleware('auth')->name('update');


// Update user profile
Route::post('/edit', [UserController::class, 'update'])->middleware('auth')->name('edit');

Route::post('/profile-picture', [ProfileController::class, 'updateProfilePicture'])
    ->middleware('auth')
    ->name('profile.updatePicture');
