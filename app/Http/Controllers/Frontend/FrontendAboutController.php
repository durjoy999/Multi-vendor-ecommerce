<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontendAboutController extends Controller
{
    public function index(){
        $teams = Team::where('status', 'Active')->get();
        return view('frontend.pages.about.index',[
            'teams' => $teams
        ]);
    }
}
