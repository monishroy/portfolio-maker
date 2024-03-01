<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function portfolio($username)
    {
        $user = User::where('username', $username)->first();

        if ($user != null) {
            $template = Template::find($user->template_id);

            $data['user_info'] = $user;
            $data['experinces'] = Experience::where('user_id', $user->id)->get();
            $data['educations'] = Education::where('user_id', $user->id)->get();
            $data['languages'] = Language::where('user_id', $user->id)->get();

            return view('frontend/' . $template->path . '/index', $data);
        } else {
            return back()->with('error', 'User Not Found');
        }
    }
}
