<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $user = Auth::user();
    
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('storage/profile_pictures'), $imageName);
    
            // Save the filename to the user's profile
            $user->profile_picture = 'profile_pictures/' . $imageName;
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
    

    
    public function viewProfile()
{
    $user = Auth::user();
    return view('edit', compact('user'));
}

public function deleteProfilePicture()
    {
        $user = Auth::user();

        // Check if the user has an existing profile picture
        if ($user->profile_picture) {
            \Storage::disk('public')->delete($user->profile_picture); // Delete the file from storage
            $user->profile_picture = null; // Remove the profile picture reference in the database
            $user->save(); // Save the changes
        }

        return redirect()->route('edit')->with('success', 'Profile picture deleted successfully.');
    }

    public function storeProfilePicture(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the uploaded file in 'public/profile_picture'
        $path = $request->file('profile_picture')->store('public/profile_picture');

        // Optionally, save the file path to the database or return a response
        // Assuming you want to save the path in the database:
        // Auth::user()->update(['profile_picture' => $path]);

        return back()->with('success', 'Profile picture uploaded successfully!');
    }



}
