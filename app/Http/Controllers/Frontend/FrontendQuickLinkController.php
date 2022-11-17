<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\QuickLink;
use Illuminate\Http\Request;

class FrontendQuickLinkController extends Controller
{
    /**
     * show a specific quickLink
     */
    public function index($slug)
    {
        $quickLink = QuickLink::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.quick_link.index',[
            'quickLink' => $quickLink
        ]);
    }
}
