<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminChildCategoryController extends Controller
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
        if(is_null($this->user) || !$this->user->can('childCategory.all')){
            abort(403,'Unauthorized access');
        }
        $childCategories = ChildCategory::with(['createdBy','editedBy','category','subCategory'])->orderBy('serial','asc')->get();
        return view('admin.pages.child_category.index',[
            'childCategories' => $childCategories
        ]);
    }

    /**
     * select specifice sub category under a category
     */
    public function subCategory($id){
        $subCategories = SubCategory::where('category_id',$id)->where('status','Active')->get();
        return response()->json($subCategories);
    }

    /**
     * show a create form for creating new category
     */
    public function create(){
        if(is_null($this->user) || !$this->user->can('childCategory.create')){
            abort(403,'Unauthorized access');
        }
        $categories = Category::where('status','Active')->get();
        $subCategories = SubCategory::where('status','Active')->get();
        return view('admin.pages.child_category.create',[
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }
    /**
     * store into specific database 
     */
    public function store(Request $request){
        if(is_null($this->user) || !$this->user->can('childCategory.create')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required|unique:child_categories,name',
            'serial' => 'required|unique:child_categories,serial|numeric|min:1',
            'slug' => 'required|unique:child_categories,slug',
            'image' => 'image'
        ]);

        $childCategory = new ChildCategory();
        if($request->hasFile('image')){
            $childCategory->image = $request->file('image')->store('/photo/child_category/');
        }
        $childCategory->category_id = $request->category_id;
        $childCategory->sub_category_id = $request->sub_category_id;
        $childCategory->name = $request->name;
        $childCategory->serial = $request->serial;
        $childCategory->slug = $request->slug;
        $childCategory->meta_title = $request->meta_title;
        $childCategory->meta_details = $request->meta_details;
        $childCategory->meta_keywords = $request->meta_keywords;
        $childCategory->status = $request->status;
        $childCategory->created_by = Auth::guard('admin')->User()->id;
        $childCategory->save();
        return back()->with('child_category_created_successfully','Child Category Created Successfully');
    }

    /**
     * show  a form for editing 
     */
    public function edit($id){
        if(is_null($this->user) || !$this->user->can('childCategory.edit')){
            abort(403,'Unauthorized access');
        }
        $categories = Category::where('status','Active')->get();
        $subCategories = SubCategory::where('status','Active')->get();
        $childCategory = $this->specificItem($id);
        return view('admin.pages.child_category.edit',[
            'childCategory' => $childCategory,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }

    /**
     * update a specific item
     */
    public function update(Request $request,$id){
        if(is_null($this->user) || !$this->user->can('childCategory.edit')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required|unique:child_categories,name,'.$id,
            'serial' => 'required|numeric|min:1|unique:child_categories,serial,'.$id,
            'slug' => 'required|unique:child_categories,slug,'.$id,
            'image' => 'image'
        ]);

        $childCategory = $this->specificItem($id);
        if($request->hasFile('image')){
            if($childCategory->image != 'default.png'){
                Storage::delete($childCategory->image);
            }
            $childCategory->image = $request->file('image')->store('/photo/child_category/');
        }
        $childCategory->category_id = $request->category_id;
        $childCategory->sub_category_id = $request->sub_category_id;
        $childCategory->name = $request->name;
        $childCategory->serial = $request->serial;
        $childCategory->slug = $request->slug;
        $childCategory->meta_title = $request->meta_title;
        $childCategory->meta_details = $request->meta_details;
        $childCategory->meta_keywords = $request->meta_keywords;
        $childCategory->status = $request->status;
        $childCategory->edited_by = Auth::guard('admin')->User()->id;
        $childCategory->save();

        return back()->with('child_category_update_success','Child Category Updated Successfully');
    }

    /**
     * statusupdate
     */
    public function statusUpdate($id){
        if(is_null($this->user) || !$this->user->can('childCategory.edit')){
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
        if(is_null($this->user) || !$this->user->can('childCategory.all')){
            abort(403,'Unauthorized access');
        }
        $childCategory = $this->specificItem($id);
        return view('admin.pages.child_category.show',[
            'childCategory' => $childCategory
        ]);
    }

    /**
     * destroy a specific category
     */
    public function destroy($id){
        if(is_null($this->user) || !$this->user->can('childCategory.delete')){
            abort(403,'Unauthorized access');
        }
        try{
            $childCategory = $this->specificItem($id);
            $childCategory->delete();
            if($childCategory->image != 'default.png'){
                Storage::delete($childCategory->image);
            }
            return back()->with('child_category_deleted_successfully','Child Category Deleted Successfully');
        }
        catch(Exception $e){
            if($e->errorInfo[1] == 1451){
                return back()->with('please_delete_everything_all_relatedted_resource_first','First Delete Everything, which is under this child category!!!');
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
        return ChildCategory::with(['createdBy','editedby','category','subCategory'])->findOrFail($id);
    }
}
