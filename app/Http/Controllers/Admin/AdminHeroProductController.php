<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminHeroProductController extends Controller
{
    /**
     * Construct method
     */
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->User();
            return $next($request);
        });
    }
    /**
     * Show the hero Product form
     */
    public function heroProduct()
    {
        if (is_null($this->user) || !$this->user->can('heroProduct.index')) {
            abort(403, 'Unauthorized access');
        }
        $heroProduct = HeroProduct::with(['editedBy'])->latest()->first();
        return view('admin.pages.hero_product.hero_product', [
            'heroProduct' => $heroProduct
        ]);
    }

    /**
     * Update the hero Product Update
     */
    public function heroProductUpdate(Request $request,$id)
    {

        if (is_null($this->user) || !$this->user->can('heroProduct.update')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required',
            'product_link' => 'required',
            'price' => 'required|numeric'
        ]);

        $heroProduct = $this->specificItem($id);
        if ($request->hasFile('image')) {
            if ($heroProduct->image != 'default.png') {
                Storage::delete($heroProduct->image);
            }
            $heroProduct->image = $request->file('image')->store('/photo/hero_product/');
          
        }
        $heroProduct->title = $request->title;
        $heroProduct->product_link = $request->product_link;
        $heroProduct->price = $request->price;
        $heroProduct->edited_by = Auth::guard('admin')->User()->id;
        $heroProduct->save();
        return back()->with('hero_products_update_success', 'Hero product Update Successfully');
    }
    /**
     * return a specific coupon
     */
    public function specificItem($id)
    {
        return HeroProduct::findOrFail($id);
    }
}
