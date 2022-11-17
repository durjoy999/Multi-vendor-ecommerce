<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminBrandController extends Controller
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
     * show all brand order by desc
     */
    public function index(){
        if(is_null($this->user) || !$this->user->can('brand.all')){
            abort(403,'Unauthorized access');
        }
        $brands = Brand::with(['createdBy','editedBy'])->orderBy('serial','asc')->select('id','image','name','serial','status','created_by','edited_by')->get();
        return view('admin.pages.brand.index',[
            'brands' => $brands
        ]);
    }

    /**
     * show a create form for creating new brand
     */
    public function create(){
        if(is_null($this->user) || !$this->user->can('brand.create')){
            abort(403,'Unauthorized access');
        }
        return view('admin.pages.brand.create');
    }
    /**
     * store into specific database 
     */
    public function store(Request $request){
        if(is_null($this->user) || !$this->user->can('brand.create')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'name' => 'required|unique:brands,name',
            'serial' => 'required|unique:brands,serial|numeric|min:1',
            'slug' => 'required|unique:brands,slug',
            'image' => 'image'
        ]);

        $brand = new Brand();
        if($request->hasFile('image')){
            $brand->image = $request->file('image')->store('/photo/brand/');
        }
        $brand->name = $request->name;
        $brand->serial = $request->serial;
        $brand->slug = $request->slug;
        $brand->meta_title = $request->meta_title;
        $brand->meta_details = $request->meta_details;
        $brand->meta_keywords = $request->meta_keywords;
        $brand->status = $request->status;
        $brand->created_by = Auth::guard('admin')->User()->id;
        $brand->save();
        return back()->with('brand_created_successfully','Brand Created Successfully');
    }

    /**
     * show  a form for editing 
     */
    public function edit($id){
        if(is_null($this->user) || !$this->user->can('brand.edit')){
            abort(403,'Unauthorized access');
        }
        $brand = $this->specificItem($id);
        return view('admin.pages.brand.edit',[
            'brand' => $brand
        ]);
    }

    /**
     * update a specific item
     */
    public function update(Request $request,$id){
        if(is_null($this->user) || !$this->user->can('brand.edit')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'name' => 'required|unique:brands,name,'.$id,
            'serial' => 'required|numeric|min:1|unique:brands,serial,'.$id,
            'slug' => 'required|unique:brands,slug,'.$id,
            'image' => 'image'
        ]);

        $brand = $this->specificItem($id);
        if($request->hasFile('image')){
            if($brand->image != 'default.png'){
                Storage::delete($brand->image);
            }
            $brand->image = $request->file('image')->store('/photo/brand/');
        }
        $brand->name = $request->name;
        $brand->serial = $request->serial;
        $brand->slug = $request->slug;
        $brand->meta_title = $request->meta_title;
        $brand->meta_details = $request->meta_details;
        $brand->meta_keywords = $request->meta_keywords;
        $brand->status = $request->status;
        $brand->edited_by = Auth::guard('admin')->User()->id;
        $brand->save();

        return back()->with('brand_update_success','Brand Updated Successfully');
    }

    /**
     * status update
     */
    public function statusUpdate($id){
        if(is_null($this->user) || !$this->user->can('brand.edit')){
            abort(403,'Unauthorized access');
        }
        $data = $this->specificItem($id);
        if($data->status == $data->isActive()){
            $data->status = $data->getDeactive();
        }
        else{
            $data->status = $data->getActive();
        }
        $data->edited_by = Auth::guard('admin')->User()->id;
        $data->save();
        return back()->with('status_updated_successfully','Status Updated Successfully');

    }

    /**
     * show a specific brand
     */
    public function show($id){
        if(is_null($this->user) || !$this->user->can('brand.all')){
            abort(403,'Unauthorized access');
        }
        $brand = $this->specificItem($id);
        return view('admin.pages.brand.show',[
            'brand' => $brand
        ]);
    }

    /**
     * destroy a specific brand
     */
    public function destroy($id){
        if(is_null($this->user) || !$this->user->can('brand.delete')){
            abort(403,'Unauthorized access');
        }
        try{
            $brand = $this->specificItem($id);
            $brand->delete();
            if($brand->image != 'default.png'){
                Storage::delete($brand->image);
            }
            return back()->with('brand_deleted_successfully','Category Deleted Successfully');
        }
        catch(Exception $e){
           
            if($e->errorInfo[1] == 1451){
                return back()->with('please_delete_everything_all_relatedted_resource_first','First Delete Everything, which is under this Brand!!!');
            }
            else{
                return back()->with('someting_wrong','Something Worng!!');
            }
        }
        
        
    }

    /**
     * return a specific brand
     */
    public function specificItem($id){
        return Brand::with(['createdBy','editedby'])->findOrFail($id);
    }
}
