<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Carbon\Carbon; // Import Carbon for date manipulation

class RenewalController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Access the currently authenticated user
        return view('renew', compact('user'));
    }

    public function renew(Request $request)
    {
        $user = Auth::user(); // Access the currently authenticated user
        $additionalYears = $request->renewalPeriod;

        // Ensure membership_expiry is parsed as a Carbon date
        $newExpiryDate = Carbon::parse($user->membership_expiry)->addYears($additionalYears);

        // Update the user's membership expiry date
        $user->update(['membership_expiry' => $newExpiryDate]);

        return redirect()->route('membership')->with('success', 'Membership renewed successfully.');
    }
}
