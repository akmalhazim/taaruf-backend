<?php

namespace App\Http\Controllers;

use App\Expertise;
use App\Profile;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'profile.user_id' => 'required|string|unique:profile',
            'profile.name' => 'required|string|max:255',
            'profile.background_url' => 'required|string',
            'profile.from' => 'required|string',
            'profile.picture' => 'required|string',
            'profile.quote' => 'required|string',
            'expertise.*.expertise' => 'required|string'
        ]);
        $profile = new Profile;
        $profile->user_id = $request->profile['user_id'];
        $profile->from = $request->profile['from'];
        $profile->name = $request->profile['name'];
        $profile->profile_picture = $request->profile['picture'];
        $profile->background_url = $request->profile['background_url'];
        $profile->quote = $request->profile['quote'];
        $profile->save();
        foreach($request->expertise as $x) {
            $expertise = new Expertise;
            $expertise->user_id = $request->profile['user_id'];
            $expertise->expertise = $x['expertise'];
            $expertise->save();
        }
        return response()->json(['success' => true],201);

    }
}
