<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTaxController extends Controller
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
     * show all tex
     */
    public function index(){
        if(is_null($this->user) || !$this->user->can('tax.all')){
            abort(403,'Unauthorized access');
        }
        $taxes = Tax::with(['createdBy','editedBy'])->get();
        return view('admin.pages.tax.index',[
            'taxes' => $taxes
        ]);
    }

    /**
     * show a form for creating new tax
     */
    public function create(){
        if(is_null($this->user) || !$this->user->can('tax.create')){
            abort(403,'Unauthorized access');
        }
        return view('admin.pages.tax.create');
    }

    /**
     * store a newly added tax to specific storage
     */
    public function store(Request $request){
        if(is_null($this->user) || !$this->user->can('tax.create')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|in:Active,Deactive'
        ]);

        Tax::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'status' => $request->status,
            'created_by' => Auth::guard('admin')->User()->id
        ]);
        return back()->with('tax_created_successfully','Tax Created Successfully');

    }
    /**
     * show a for for editing a tax
     */
    public function edit($id){
        if(is_null($this->user) || !$this->user->can('tax.edit')){
            abort(403,'Unauthorized access');
        }
        $tax = $this->specificItem($id);
        return view('admin.pages.tax.edit',[
            'tax' => $tax
        ]);
    }
    /**
     * update a specific item
     */
    public function update(Request $request,$id){
        
        if(is_null($this->user) || !$this->user->can('tax.edit')){
            abort(403,'Unauthorized access');
        }
        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|in:Active,Deactive'
        ]);
        Tax::where('id',$id)->update([
            'title' => $request->title,
            'amount' => $request->amount,
            'status' => $request->status,
            'edited_by' => Auth::guard('admin')->User()->id
        ]);
        return back()->with('tax_updated_successfully','Tax Updated successfully');
    }
     /**
     * statusupdate
     */
    public function statusUpdate($id){
        if(is_null($this->user) || !$this->user->can('tax.edit')){
            abort(403,'Unauthorized access');
        }
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
     * show a specific method
     * 
     */
    public function show($id){
        $tax = $this->specificItem($id);
        return view('admin.pages.tax.show',[
            'tax' => $tax
        ]);
    }


    /**
     * destroy a spacific item
     * 
     */
    public function destroy($id){
        if(is_null($this->user) || !$this->user->can('tax.edit')){
            abort(403,'Unauthorized access');
        }
        $tax = $this->specificItem($id);
        $tax->delete();
        return back()->with('tax_delete_success','Tax Deleted Successfully');
    }

    /**
     * return a specific item
     */
    public function specificItem($id){
        return Tax::findOrFail($id);
    }
}
