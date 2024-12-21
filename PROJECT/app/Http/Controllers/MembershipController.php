<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class MembershipController extends Controller
{
    public function checkMembershipStatus(Request $request)
{
    // Validate the user ID (assuming it's the 'id' field)
    $request->validate([
        'memberId' => 'required|integer|exists:users,id', // Ensure you are validating the ID field
    ]);

    // Find the user by their ID
    $user = User::where('id', $request->input('memberId'))->first(); // Use 'id' to find the user

    // Check if the user exists
    if ($user) {
        // Ensure the 'join_date' is valid
        if (is_null($user->join_date)) {
            return response()->json(['status' => 'Error', 'message' => 'Join date is missing.']);
        }

        // Process the join date and expiry
        $joinDate = new Carbon($user->join_date);
        $expiryDate = $joinDate->addYear(); // Add one year to the join date
        $currentDate = Carbon::now();

        // Determine if the membership is active or expired
        $status = $currentDate->lessThan($expiryDate) ? 'Active' : 'Expired';

        return response()->json([
            'status' => $status,
            'expiry' => $expiryDate->toDateString(), // Return the expiry date as a string
        ]);
    }

    // If no user is found, return 'Not Found'
    return response()->json(['status' => 'Not Found']);
}

}
