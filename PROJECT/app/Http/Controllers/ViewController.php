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
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Handle the profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }
    
            // Save the new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }
    
        // Update other fields
        $user->update($request->only(['name', 'email']));
    
        // Save the updated user
        $user->save();
    
        // Redirect back with a success message
        return redirect()->route('view', ['id' => $user->id])->with('success', 'Profile updated successfully.');
    }

    
    public function deleteProfilePicture()
{
    $user = Auth::user();

    if ($user->profile_picture) {
        \Storage::disk('public')->delete($user->profile_picture);
        $user->profile_picture = null;
        $user->save();
    }

    return redirect()->route('edit')->with('success', 'Profile picture deleted successfully.');
}


}
