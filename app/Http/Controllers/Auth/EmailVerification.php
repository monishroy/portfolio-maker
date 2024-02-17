<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerifyMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailVerification extends Controller
{
    public function index($id, $token)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return redirect()->route('register')->with('error', 'Something is Worng!');
        } else {
            $email = $user->email;
            $old_token = $user->token;

            if ($old_token == $token) {
                return view('auth.verification', compact('email', 'id'));
            } else {
                return back()->with('error', 'Token Invalid!');
            }
        }
    }

    public function sendMail($id)
    {
        $token = Str::random(40);
        $otp = rand(1000, 9999);

        $user = User::find($id);
        $user->otp = $otp;
        $user->expire_otp = time();
        $user->token = $token;
        $user->save();

        $name = $user->fname;
        $email = $user->email;
        $title = 'Email Verification';
        return redirect("/verification/" . $id . '/' . $token)->with('success', 'Email send successfully.');
        // $result = Mail::to($email)->send(new EmailVerifyMail($email, $title, $name, $otp));
        // if($result){
        //     return redirect("/verification/".$id.'/'.$token)->with('success','Email send successfully.');
        // }else{
        //     return back()->with('error','Something is Worng!');
        // }
    }

    public function verify(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email:filter',
                'otp.*' => 'required|numeric',
            ]
        );

        $array = $request->otp;
        $otp = implode("", $array);

        $email = $request->email;
        $user = User::where('email', $email)->first();

        $oldOTP = $user->otp;
        $id = $user->id;
        $time = $user->expire_otp;
        $currentTime = time();

        if ($oldOTP == $otp) {
            if ($currentTime >= $time && $time >= $currentTime - (90 + 5)) { //90 seconds
                $users = User::find($id);
                $users->is_verified = 1;
                $result = $users->save();
                if ($result) {
                    Auth::logout();
                    return redirect()->route('login')->with('success', 'Email verify successfully.');
                } else {
                    return back()->with('error', 'Something is Worng !');
                }
            } else {
                return back()->with('error', 'Your OTP has been Expired!');
            }
        } else {
            return back()->with('error', 'Please enter valid OTP !');
        }
    }
}
