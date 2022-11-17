<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminFaqController extends Controller
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
     * show all faq order by desc
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('faq.all')) {
            abort(403, 'Unauthorized access');
        }
        $faqs = Faq::with(['createdBy', 'editedBy'])->latest()->get();
        return view('admin.pages.faq.index', [
            'faqs' => $faqs
        ]);
    }
    /**
     * show a create form for creating new faq
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('faq.create')) {
            abort(403, 'Unauthorized access');
        }
        return view('admin.pages.faq.create');
    }
    /**
     * store into specific database
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required|unique:faqs,title',
            'description' => 'required',
            'slug' => 'required|unique:faqs,slug'
        ]);

        $faq = new Faq();

        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->slug = $request->slug;
        $faq->status = $request->status;
        $faq->created_by = Auth::guard('admin')->User()->id;
        $faq->save();
        return back()->with('faq_created_successfully', 'Faq Created Successfully');
    }
    /**
     * show  a form for editing
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('faq.edit')) {
            abort(403, 'Unauthorized access');
        }
        $faq = $this->specificItem($id);
        return view('admin.pages.faq.edit', [
            'faq' => $faq
        ]);
    }
    /**
     * update a specific item
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('faq.edit')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:faqs,slug,' . $id,
        ]);

        $faq = $this->specificItem($id);

        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->slug = $request->slug;
        $faq->status = $request->status;
        $faq->edited_by = Auth::guard('admin')->User()->id;
        $faq->save();

        return back()->with('faq_update_success', 'Faq Updated Successfully');
    }
    /**
     * status update
     */
    public function statusUpdate($id)
    {
        if (is_null($this->user) || !$this->user->can('faq.edit')) {
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
    /**
     * destroy a specific faq
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('faq.delete')) {
            abort(403, 'Unauthorized access');
        }
        try {
            $faq = $this->specificItem($id);
            $faq->delete();

            return back()->with('faq_deleted_successfully', 'Faq Deleted Successfully');
        } catch (Exception $e) {

            if ($e->errorInfo[1] == 1451) {
                return back()->with('please_delete_everything_all_relatedted_resource_first', 'First Delete Everything, which is under this category!!!');
            } else {
                return back()->with('someting_wrong', 'Something Worng!!');
            }
        }
    }
    /**
     * return a specific faq
     */
    public function specificItem($id)
    {
        return Faq::with(['createdBy', 'editedby'])->findOrFail($id);
    }
}
