<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendShopController extends Controller
{
    public function index(){
        return view('frontend.pages.shops.shop');
    }

    public function singleProduct(){
        return view('frontend.pages.shops.single_product');
    }
}
