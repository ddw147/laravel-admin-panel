<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
        return redirect()->back()->with('status', 'Otp Resent To your mobile no');
    }
    public function verify(Request $request)
    {
         $otp=$request->input('otp');
         $user = Auth::user();
         $lastotp = $user->lastotp();
        if(is_null($lastotp)) {
            abort(403, 'SomeThing Bad Happend');
        }

        if($otp==$lastotp->otp) {
            $user->verify();
            return redirect('/');
        }    

         return redirect()->back()->withErrors(['otp'=>'OTP did not match']);
    }
}
