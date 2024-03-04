<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function dashboard()
    {
        return view('frontend.dashboard');
    }

    public function index()
    {
        if (Auth::user()->template_id != null) {
            return view('frontend.profile.index');
        } else {
            return redirect()->route('frontend.dashboard');
        }
    }

    public function messages()
    {
        return view('frontend.message');
    }
}
