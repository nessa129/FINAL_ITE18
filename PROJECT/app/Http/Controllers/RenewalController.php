<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RenewalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('renew', compact('user'));
    }

    public function renew(Request $request)
    {
        $user = Auth::user();
        $additionalYears = $request->renewalPeriod;
        $newExpiryDate = Carbon::parse($user->membership_expiry)->addYears($additionalYears);
        $user->update(['membership_expiry' => $newExpiryDate]);
        return redirect()->route('membership')->with('success', 'Membership renewed successfully.');
    }
}
