<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'id_number' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:15',
            'membership_status' => 'nullable|string',
            'renewal_date' => 'nullable|date',
        ]);

        // Update user data
        $user->update($request->only(['name', 'email', 'id_number', 'contact_number', 'membership_status', 'renewal_date']));

        // Redirect back to the view page with a success message
        return redirect()->route('view')->with('success', 'Profile updated successfully');
    }
}
