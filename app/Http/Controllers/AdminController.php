<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view() {
        $profiles = Profile::with('expertise')->get();
        return response()->json(['data' => $profiles],200);
    }
}
