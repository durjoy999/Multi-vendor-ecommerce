<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class AdminCategoryController extends Controller
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
        if(is_null($this->user) || !$this->user->can('category.all')){
            abort(403,'Unauthorized access');
        }
        $categories = Category::with(['createdBy','editedBy'])->orderBy('serial','asc')->get();
        return view('admin.pages.category.index',[
            'categories' => $categories
        ]);
    }

    /**
     * show a create form for creating new category
     */
    public function create(){
        if(is_null($this->user) || !$this->user->can('category.create')){
            abort(403,'Unauthorized access');
        }
        return view('admin.pages.category.create');
    }
    /**
     * store into specific database 
     */
    public function store(Request $request){
        if(is_null($this->user) || !$this->user->can('category.create')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'name' => 'required|unique:categories,name',
            'serial' => 'required|unique:categories,serial|numeric|min:1',
            'slug' => 'required|unique:categories,slug',
            'image' => 'image'
        ]);

        $category = new Category();
        if($request->hasFile('image')){
            $category->image = $request->file('image')->store('/photo/category/');
        }
        $category->name = $request->name;
        $category->serial = $request->serial;
        $category->slug = $request->slug;
        $category->meta_title = $request->meta_title;
        $category->meta_details = $request->meta_details;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = $request->status;
        $category->created_by = Auth::guard('admin')->User()->id;
        $category->save();
        return back()->with('category_created_successfully','Category Created Successfully');
    }

    /**
     * show  a form for editing 
     */
    public function edit($id){
        if(is_null($this->user) || !$this->user->can('category.edit')){
            abort(403,'Unauthorized access');
        }
        $category = $this->specificItem($id);
        return view('admin.pages.category.edit',[
            'category' => $category
        ]);
    }

    /**
     * update a specific item
     */
    public function update(Request $request,$id){
        if(is_null($this->user) || !$this->user->can('category.edit')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
            'serial' => 'required|numeric|min:1|unique:categories,serial,'.$id,
            'slug' => 'required|unique:categories,slug,'.$id,
            'image' => 'image'
        ]);

        $category = $this->specificItem($id);
        if($request->hasFile('image')){
            if($category->image != 'default.png'){
                Storage::delete($category->image);
            }
            $category->image = $request->file('image')->store('/photo/category/');
        }
        $category->name = $request->name;
        $category->serial = $request->serial;
        $category->slug = $request->slug;
        $category->meta_title = $request->meta_title;
        $category->meta_details = $request->meta_details;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = $request->status;
        $category->edited_by = Auth::guard('admin')->User()->id;
        $category->save();

        return back()->with('category_update_success','Category Updated Successfully');
    }

    /**
     * statusupdate
     */
    public function statusUpdate($id){
        if(is_null($this->user) || !$this->user->can('category.edit')){
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
        if(is_null($this->user) || !$this->user->can('category.all')){
            abort(403,'Unauthorized access');
        }
        $category = $this->specificItem($id);
        return view('admin.pages.category.show',[
            'category' => $category
        ]);
    }

    /**
     * destroy a specific category
     */
    public function destroy($id){
        if(is_null($this->user) || !$this->user->can('category.delete')){
            abort(403,'Unauthorized access');
        }
        try{
            $category = $this->specificItem($id);
            $category->delete();
            if($category->image != 'default.png'){
                Storage::delete($category->image);
            }
            return back()->with('category_deleted_successfully','Category Deleted Successfully');
        }
        catch(Exception $e){
           
            if($e->errorInfo[1] == 1451){
                return back()->with('please_delete_everything_all_relatedted_resource_first','First Delete Everything, which is under this category!!!');
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
        return Category::with(['createdBy','editedby'])->findOrFail($id);
    }
}
