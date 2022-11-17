<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HeroProduct;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 'Active')->get();
        $heroProduct = HeroProduct::latest()->first();
        $brands = Brand::where('status', 'Active')->select('id','image','name')->get();
        $categorys = Category::where('status', 'Active')->select('id','image','name')->get();
        return view('frontend.pages.home.index',[
            'sliders' => $sliders,
            'heroProduct' => $heroProduct,
            'categorys' => $categorys,
            'brands' => $brands
        ]);
    }
}
