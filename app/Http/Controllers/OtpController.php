<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    //

	public function show()
	{
		return view('auth.otpverify');
	}

	public function resendOtp(Request $request)
	{
		Auth::user()->sendotp();
		return redirect()->back()->with('status','Otp Resent To your mobile no');
	}
}
