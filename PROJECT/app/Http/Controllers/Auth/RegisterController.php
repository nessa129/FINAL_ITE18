<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255|unique:users',
            'program' => 'required|string',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Set membership expiry to one year from today
        $expiryDate = Carbon::now()->addYear();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'student_id' => $request->student_id,
            'membership_expiry' => now()->addYear(),
            'program' => $validated['program'], 
            'membership_status' => 'active', 
        ]);

        // Trigger the Registered event to send the verification email
        event(new Registered($user));

        // Log the user in immediately after registration
        auth()->login($user);

        return redirect()->route('home');
    }
}
