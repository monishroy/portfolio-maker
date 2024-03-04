<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialMedia;
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

            if ($user->persentance >= 80) {
                if ($user->temp_status == 1) {
                    $template = Template::find($user->template_id);

                    $data['user_info'] = $user;
                    $data['experinces'] = Experience::where('user_id', $user->id)->get();
                    $data['educations'] = Education::where('user_id', $user->id)->get();
                    $data['languages'] = Language::where('user_id', $user->id)->get();
                    $data['projects'] = Project::where('user_id', $user->id)->get();
                    $data['social_medias'] = SocialMedia::where('user_id', $user->id)->get();

                    $user->increment('views', 1);

                    return view('frontend/' . $template->path . '/index', $data);
                } else {
                    return back()->with('error', 'Deactive Portfolio');
                }
            } else {
                return back()->with('error', 'Please min 80% complate your profile');
            }
        } else {
            return back()->with('error', 'User Not Found');
        }
    }
}
