<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductSpecificationController extends Controller
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
     * show all product specification
     */
    public function index($id){
        Product::findOrFail($id);
        $productSpecifications = ProductSpecification::where('product_id',$id)->get();
        
        return view('admin.pages.product_specification.index',[
            'productSpecifications' => $productSpecifications,
            'productId' => $id
        ]);
    }

    /**
     * store a newly added spcification
     */
    public function store(Request $request){
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
        $productSpecification = new ProductSpecification();
        $productSpecification->product_id = $request->product_id;
        $productSpecification->name = $request->name;
        $productSpecification->description = $request->description;
        $productSpecification->created_by = Auth::guard('admin')->User()->id;
        $productSpecification->save();
        return back()->with('product_specification_added_successfully','Product Specification Added Successully');
    }

    /**
     * update a specification
     */
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $productSpecification = ProductSpecification::where('id',$id)->firstOrFail();
        $productSpecification->name = $request->name;
        $productSpecification->description = $request->description;
        $productSpecification->edited_by = Auth::guard('admin')->User()->id;
        $productSpecification->save();
        return back()->with('product_specification_update_successfully','Product Specification Updated Successfully');
    }

    /**
     * destroy
     */
    public function destroy($id){
        $productSpecification = ProductSpecification::where('id',$id)->firstOrFail();
        $productSpecification->delete();
        return back()->with('product_specification_delete_successfully','Product Specification Deleted Successfully');
    }
}
