<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function dashboard()
    {
        return view('frontend.dashboard');
    }

    public function index()
    {
        return view('frontend.profile.index');
    }

    public function messages()
    {
        return view('frontend.message');
    }
}
