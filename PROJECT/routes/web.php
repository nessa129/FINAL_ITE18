<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\RenewalController;



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


Route::get('/view', function () {
    $user = Auth::user();
    \Log::info('User Membership Expiry:', ['expiry' => $user->membership_expiry]);
    return view('view', compact('user'));
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


    Route::get('/merch', function () {
        return view('merch');
    })->middleware('auth')->name('merch');
    
    Route::get('/payment', function () {
        return view('payment');
    })->middleware('auth')->name('payment');
    
    
// View Profile
Route::get('/profile', [ViewController::class, 'view'])->name('user.view');

// Edit Profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('user.edit');

// Update Profile
Route::post('/profile/update', [ProfileController::class, 'update'])->name('user.update');
    
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::post('/membership/check-status', [MembershipController::class, 'checkStatus']);


    Route::post('/renew', [RenewalController::class, 'renew'])->name('renew');


Route::get('/membership', [MembershipController::class, 'index'])->name('membership');

Route::post('/view/delete-picture', [ViewController::class, 'deleteProfilePicture'])->name('view.deletePicture');

Route::post('/profile/delete-picture', [ProfileController::class, 'deleteProfilePicture'])->name('profile.deletePicture');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        $user = Auth::user();
        return view('home', compact('user'));
    })->name('home');
    
    // Other routes for authenticated users...
});

Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/picture', [ProfileController::class, 'storeProfilePicture'])->name('profile.updatePicture');
