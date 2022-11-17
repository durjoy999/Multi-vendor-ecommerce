<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductGalleryImage;
use App\Models\SubCategory;
use App\Models\Tax;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
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
    public function index(){
        $products = Product::with(['brand','category','subCategory','childCategory','createdBy','editedBy'])->latest()->select('id','thumbnail_image','brand_id','category_id','title','sku','current_price','status','created_by','edited_by')->paginate(1);
        return view('admin.pages.product.index',[
            'products' => $products
        ]);
    }

    /**
     * get all subcategory
     */
    public function getSubcategory($id){
        $subCategories = SubCategory::where('category_id',$id)->select('id','name')->where('status','Active')->get();
        return response()->json($subCategories);
    }

     /**
      * get all child category
      */
    public function getChildCategory($subCategory){
        $childCategories = ChildCategory::where('sub_category_id',$subCategory)->where('status','Active')->select('id','name')->get();
        return response()->json($childCategories);
    }

    public function create(){
        $brands = Brand::where('status','Active')->get();
        $categories = Category::where('status','Active')->orderBy('name')->get();
        $subCategories = SubCategory::where('status','Active')->orderBy('name')->get();
        $childCategories = ChildCategory::where('status','Active')->orderBy('name')->get();
        $taxes = Tax::where('status','Active')->get();
        return view('admin.pages.product.create',[
            'brands' => $brands,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'childCategories' => $childCategories,
            'taxes' => $taxes
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'thumbnail_image' => 'required|image',
            'gallery_image' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'child_category_id' => 'required',
            'title' => 'required',
            'sku' => 'required|unique:products,sku',
            'slug' => 'required|unique:products,slug',
            'previous_price' => 'numeric|min:0',
            'current_price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'short_details' => 'required',
            'long_details' => 'required',
            'tax_id' => 'required',
            'status' => 'required'
        ]);

        $product = new Product();
        $product->thumbnail_image = $request->file('thumbnail_image')->store('photo/product/thumbnail');
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->child_category_id = $request->child_category_id;
        $product->title = $request->title;
        $product->sku = $request->sku;
        $product->slug = $request->slug;
        $product->previous_price = $request->previous_price;
        $product->current_price = $request->current_price;
        $product->stock = $request->stock;
        $product->short_details = $request->short_details;
        $product->long_details = $request->long_details;
        $product->status = $request->status;
        $product->tax_id = $request->tax_id;
        $product->meta_title = $request->meta_title;
        $product->meta_details= $request->meta_details;
        $product->meta_keywords = $request->meta_keywords;
        $product->created_by = Auth::guard('admin')->User()->id;
        $product->save();


        $files = $request->file('gallery_image');
        foreach ($files as $file) {
            ProductGalleryImage::create([
                'product_id' => $product->id,
                'image' => $file->store('photo/product/gallery_image')
            ]);
        }
        // if($request->has('gallery_image')){
        //     for ($i=0; $i <count(collect($request)->get('gallery_image')) ; $i++) {
        //         ProductGalleryImage::create([
        //             'product_id' => $product->id,
        //             'image' => $request->file()
        //         ]);
        //     }
        // }



        return back()->with('product_added_successfully','New Product Created Successfully');

    }
    public function edit($id){

        $brands = Brand::where('status','Active')->get();
        $categories = Category::where('status','Active')->orderBy('name')->get();
        $subCategories = SubCategory::where('status','Active')->orderBy('name')->get();
        $childCategories = ChildCategory::where('status','Active')->orderBy('name')->get();
        $taxes = Tax::where('status','Active')->get();

        $product = $this->specificItem($id);

        return view('admin.pages.product.edit',[
            'brands' => $brands,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'childCategories' => $childCategories,
            'taxes' => $taxes,
            'product' => $product
        ]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'child_category_id' => 'required',
            'title' => 'required',
            'sku' => 'required|unique:products,sku,'.$request->route('id'),
            'slug' => 'required|unique:products,slug,'.$request->route('id'),
            'previous_price' => 'numeric|min:0',
            'current_price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'short_details' => 'required',
            'long_details' => 'required',
            'tax_id' => 'required',
            'status' => 'required'
        ]);

        $product =  $this->specificItem($id);
        if($request->hasFile('thumbnail_image')){

            Storage::delete($product->thumbnail_image);
            $product->thumbnail_image = $request->file('thumbnail_image')->store('photo/product/thumbnail');
        }
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->child_category_id = $request->child_category_id;
        $product->title = $request->title;
        $product->sku = $request->sku;
        $product->slug = $request->slug;
        $product->previous_price = $request->previous_price;
        $product->current_price = $request->current_price;
        $product->stock = $request->stock;
        $product->short_details = $request->short_details;
        $product->long_details = $request->long_details;
        $product->status = $request->status;
        $product->tax_id = $request->tax_id;
        $product->meta_title = $request->meta_title;
        $product->meta_details= $request->meta_details;
        $product->meta_keywords = $request->meta_keywords;
        $product->created_by = Auth::guard('admin')->User()->id;
        $product->save();

        if($request->hasFile('gallery_image')){
            $files = $request->file('gallery_image');
            $datas = ProductGalleryImage::where('product_id',$id)->get();
            foreach ($datas as $data) {
                $data->delete();
                Storage::delete($data->image);
            }
            foreach ($files as $file) {
                ProductGalleryImage::create([
                    'product_id' => $product->id,
                    'image' => $file->store('photo/product/gallery_image')
                ]);
                
            }
        }
        return back()->with('product_updated_successfully','Product Updated Successfully');
    }
    /**
     * status update
     */
    public function statusUpdate($id)
    {
        if (is_null($this->user) || !$this->user->can('product.edit')) {
            abort(403, 'Unauthorized access');
        }
        $data = $this->specificItem($id);
        if ($data->status == $data->isActive()) {
            $data->status = $data->getDeactive();
        } else {
            $data->status = $data->getActive();
        }
        $data->edited_by = Auth::guard('admin')->User()->id;
        $data->save();
        return back()->with('status_updated_successfully', 'Status Updated Successfully');
    }
    public function show($id){
        $product = $this->specificItem($id);
        return view('admin.pages.product.show',[
            'product' => $product
        ]);
    }
    public function destroy($id){
        if(is_null($this->user) || !$this->user->can('product.delete')){
            abort(403,'Unauthorized access');
        }
        try{
            $product = $this->specificItem($id);

            $product->delete();
            
            Storage::delete($product->thumbnail_image);

            foreach ($product->galleryImages as $image) {
                Storage::delete($image->image);
            }

            return back()->with('product_deleted_successfully','Product Deleted Successfully');
        }
        catch(Exception $e){
           
            if($e->errorInfo[1] == 1451){
                return back()->with('please_delete_everything_all_relatedted_resource_first','First Delete Everything, which is under this Product!!!');
            }
            else{
                return back()->with('someting_wrong','Something Worng!!');
            }
        }
    }
    /**
     * return a specific faq
     */
    public function specificItem($id)
    {
        return Product::with(['createdBy', 'editedby','galleryImages'])->findOrFail($id);
    }
}
