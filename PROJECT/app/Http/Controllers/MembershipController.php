<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MembershipController extends Controller
{
    public function checkStatus(Request $request)
    {
        // Validate the student_id input
        $request->validate([
            'student_id' => 'required|string',
        ]);

        // Find the user by student_id
        $user = User::where('student_id', $request->student_id)->first();

        // If user not found, return a "Not Found" response
        if (!$user) {
            return response()->json(['status' => 'Not Found']);
        }

        // Get the current date and check if membership is expired
        $currentDate = Carbon::now();
        $status = 'Active'; // Default status is Active
        $expiry = $user->membership_expiry; // Assuming `membership_expiry` is a Carbon instance or a date field

        // If the current date is greater than the expiry date, the membership is expired
        if ($currentDate->gt($expiry)) {
            $status = 'Expired';
        }

        // Return the membership status and expiry date as JSON
        return response()->json([
            'status' => $status,
            'expiry' => $expiry ? $expiry->format('Y-m-d') : null, // Format expiry date if it exists
        ]);
    }

    public function index()
    {
        // Add logic to fetch data for the membership page
        return view('membership'); // Ensure the 'membership' view exists
    }
}
