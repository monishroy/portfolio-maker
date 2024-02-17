<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerifyMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        $user_id = $user->id;

        return redirect()->route('forgotPasswordSendMail', $user_id);

    }

    public function varification($id,$token)
    {
        $user = User::find($id);
        
        if(is_null($user)){
            return back()->with('error','User not found !');
        }else{
            $email = $user->email;
            $old_token = $user->token;

            if($old_token == $token){
                return view('auth.forgot-verification', compact('email','id'));
            }else{
                return back()->with('error','Token Invalid!');
            }

        }
    }

    public function sendMail($id)
    {
        $token = Str::random(40);
        $otp = rand(1000,9999);

        $user = User::findOrFail($id)->update([
            'otp' => $otp,
            'expire_otp' => time(),
            'token' => $token,
        ]);

        $user = User::find($id);
        $email = $user->email;
        $name = $user->fname;
        $title = 'Reset Password';
        return redirect("/forgot-password/verification/".$id.'/'.$token)->with('success','Email send successfully.');
        // $result = Mail::to($email)->send(new EmailVerifyMail($email, $title, $name, $otp));
        // if($result){
        //     return redirect("/forgot-password/verification/".$id.'/'.$token)->with('success','Email send successfully.');
        // }else{
        //     return back()->with('error','Something is Worng!');
        // }
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter',
            'otp*' => 'required|numeric',
        ]);

        $array = $request->otp;
        $otp = implode("", $array);
        
        $email = $request->email;
        $user = User::where('email', $email)->first();

        $oldOTP = $user->otp;
        $token = $user->token;
        $id = $user->id;
        $time = $user->expire_otp;
        $currentTime = time();

        if($oldOTP == $otp){
            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                return redirect("/change-password/".$id.'/'.$token)->with('success','Email Varify successfully.');
            }
            else{
                return back()->with('error','Your OTP has been Expired!');
            }
        }else{
            return back()->with('error','Please enter valid OTP !');
        }
    }

    
}
