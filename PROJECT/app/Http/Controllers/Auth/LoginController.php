<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
{

    // Check if there are any registered users
    if (User::count() === 0) {
        return back()->withErrors([
            'message' => 'No users found. Please sign up first.',
        ]);
    }
    
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('home'); // Redirect to dashboard or home
    }

    return back()->withErrors([
        'email' => 'No users found. Please sign up first.',
    ]);
}

public function logout(Request $request)
{
    Auth::logout(); // Log out the user
    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate CSRF token

    return redirect()->route('login.page'); // Redirect to the login page
}



}
