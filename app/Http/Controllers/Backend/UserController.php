<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view user'])->only('index');
    }

    public function index()
    {
        return view('backend.users.index');
    }
}
