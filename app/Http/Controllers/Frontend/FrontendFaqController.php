<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FrontendFaqController extends Controller
{
    public function index(){

        $faqs = Faq::where('status', 'Active')->get();
        return view('frontend.pages.faq.index',[
            'faqs' => $faqs
        ]);
    }

}
