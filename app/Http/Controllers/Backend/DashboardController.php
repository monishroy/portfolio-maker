<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view dashboard'])->only('index');
    }

    public function index()
    {
        $data['users'] = User::count();
        $data['visit'] = User::sum('views');
        $data['messages'] = Message::count();
        $data['templates'] = Template::count();


        return view('backend.index', $data);
    }
}
