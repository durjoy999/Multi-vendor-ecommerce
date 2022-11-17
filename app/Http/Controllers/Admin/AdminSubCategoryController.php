<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminSubCategoryController extends Controller
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
     * show all category order by desc
     */
    public function index(){
        if(is_null($this->user) || !$this->user->can('subCategory.all')){
            abort(403,'Unauthorized access');
        }
        $subCategories = SubCategory::with(['createdBy','editedBy','category'])->orderBy('serial','asc')->get();
        return view('admin.pages.sub_category.index',[
            'subCategories' => $subCategories
        ]);
    }

    /**
     * show a create form for creating new category
     */
    public function create(){
        if(is_null($this->user) || !$this->user->can('subCategory.create')){
            abort(403,'Unauthorized access');
        }
        $categories = Category::where('status','Active')->get();
        return view('admin.pages.sub_category.create',[
            'categories' => $categories
        ]);
    }
    /**
     * store into specific database 
     */
    public function store(Request $request){
        if(is_null($this->user) || !$this->user->can('subCategory.create')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:sub_categories,name',
            'serial' => 'required|unique:sub_categories,serial|numeric|min:1',
            'slug' => 'required|unique:sub_categories,slug',
            'image' => 'image'
        ]);

        $subCategory = new SubCategory();
        if($request->hasFile('image')){
            $subCategory->image = $request->file('image')->store('/photo/sub_category/');
        }
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->serial = $request->serial;
        $subCategory->slug = $request->slug;
        $subCategory->meta_title = $request->meta_title;
        $subCategory->meta_details = $request->meta_details;
        $subCategory->meta_keywords = $request->meta_keywords;
        $subCategory->status = $request->status;
        $subCategory->created_by = Auth::guard('admin')->User()->id;
        $subCategory->save();
        return back()->with('sub_category_created_successfully','Sub Category Created Successfully');
    }

    /**
     * show  a form for editing 
     */
    public function edit($id){
        if(is_null($this->user) || !$this->user->can('subCategory.edit')){
            abort(403,'Unauthorized access');
        }
        $categories = Category::where('status','Active')->get();
        $subCategory = $this->specificItem($id);
        return view('admin.pages.sub_category.edit',[
            'subCategory' => $subCategory,
            'categories' => $categories
        ]);
    }

    /**
     * update a specific item
     */
    public function update(Request $request,$id){
        if(is_null($this->user) || !$this->user->can('subCategory.edit')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'name' => 'required|unique:sub_categories,name,'.$id,
            'serial' => 'required|numeric|min:1|unique:sub_categories,serial,'.$id,
            'slug' => 'required|unique:sub_categories,slug,'.$id,
            'image' => 'image'
        ]);

        $subCategory = $this->specificItem($id);
        if($request->hasFile('image')){
            if($subCategory->image != 'default.png'){
                Storage::delete($subCategory->image);
            }
            $subCategory->image = $request->file('image')->store('/photo/sub_category/');
        }
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->serial = $request->serial;
        $subCategory->slug = $request->slug;
        $subCategory->meta_title = $request->meta_title;
        $subCategory->meta_details = $request->meta_details;
        $subCategory->meta_keywords = $request->meta_keywords;
        $subCategory->status = $request->status;
        $subCategory->edited_by = Auth::guard('admin')->User()->id;
        $subCategory->save();

        return back()->with('sub_category_update_success','Sub Category Updated Successfully');
    }

    /**
     * statusupdate
     */
    public function statusUpdate($id){
        if(is_null($this->user) || !$this->user->can('subCategory.edit')){
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
     * show a specific category
     */
    public function show($id){
        if(is_null($this->user) || !$this->user->can('subCategory.all')){
            abort(403,'Unauthorized access');
        }
        $subCategory = $this->specificItem($id);
        return view('admin.pages.sub_category.show',[
            'subCategory' => $subCategory
        ]);
    }

    /**
     * destroy a specific category
     */
    public function destroy($id){
        if(is_null($this->user) || !$this->user->can('subCategory.delete')){
            abort(403,'Unauthorized access');
        }
        try{
            $subCategory = $this->specificItem($id);
            $subCategory->delete();
            if($subCategory->image != 'default.png'){
                Storage::delete($subCategory->image);
            }
            return back()->with('sub_category_deleted_successfully','Sub Category Deleted Successfully');
        }
        catch(Exception $e){
            if($e->errorInfo[1] == 1451){
                return back()->with('please_delete_everything_all_relatedted_resource_first','First Delete Everything, which is under this Sub category!!!');
            }
            else{
                return back()->with('someting_wrong','Something Worng!!');
            }
        }
       
    }

    /**
     * return a specific category
     */
    public function specificItem($id){
        return SubCategory::with(['createdBy','editedby','category'])->findOrFail($id);
    }
}
