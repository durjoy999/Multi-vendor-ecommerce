<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductAttributeController extends Controller
{
      /**
     * Construct method
     */
    public $user;
    public function __construct()
    {
        $this->middleware(function($request,$next){
            $this->user = Auth::guard('admin')->User();
            return $next($request);
        });
    }

    /**
     * show the list of attribute
     */
    public function index(){
        $attributes = ProductAttribute::get();
        return view('admin.pages.product_attributes.index',[
            'attributes' => $attributes
        ]);
    }

    /**
     * store a newly created item
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        ProductAttribute::create([
            'name' => $request->name,
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('attribute_create_successfully','Attribute Create Successfully');
    }
    /**
     * update a specific item
     */
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required'
        ]);
        $productAttribute = ProductAttribute::findOrFail($id);
        $productAttribute->name = $request->name;
        $productAttribute->edited_by = Auth::guard('admin')->User()->id;
        $productAttribute->save();
        return back()->with('attribute_update_successfully','Attribute Update Successfully');
    }

    /**
     * delete Specific item
     */
    public function destroy($id){
        $productAttribute = ProductAttribute::findOrFail($id);
        $productAttribute->delete();
        return back()->with('attribute_delete_successfully','Attribute Delete Successfully');
    }
   
}
