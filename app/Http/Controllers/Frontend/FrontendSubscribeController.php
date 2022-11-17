<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class FrontendSubscribeController extends Controller
{
    /**
     * Store a new user Subscribe information
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:subscribes,email'
        ]);

        Subscribe::create([
            'email' => $request->email
        ]);
        return back()->with('subscriber_form_submit_success', 'You Subscribed NewsLetter Successfully.');
    }
}
