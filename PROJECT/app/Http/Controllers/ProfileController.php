<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfilePicture(Request $request)
{
    $request->validate([
        'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {
        $image = $request->file('profile_picture');
        $imagePath = $image->store('profile_pictures', 'public');

        $user = auth()->user();
        $user->profile_picture = $imagePath;
        $user->save();

        return redirect()->back()->with('success', 'Profile picture updated!');
    }

    return redirect()->back()->with('error', 'Failed to upload profile picture.');
}

}
