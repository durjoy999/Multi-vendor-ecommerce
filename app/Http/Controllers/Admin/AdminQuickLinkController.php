<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuickLink;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminQuickLinkController extends Controller
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
     * show all quickLink
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('quickLink.all')) {
            abort(403, 'Unauthorized access');
        }
        $quicklinks = QuickLink::with(['createdBy', 'editedBy'])->latest()->get();
        return view('admin.pages.quick_link.index', [
            'quicklinks' => $quicklinks
        ]);
    }

    /**
     * show a create form for creating new quickLink
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('quickLink.create')) {
            abort(403, 'Unauthorized access');
        }
        return view('admin.pages.quick_link.create');
    }
    /**
     * store into specific database
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('quickLink.create')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required|unique:quick_links,title',
            'details' => 'required',
            'status' => 'required',
            'slug' => 'required|unique:quick_links,slug'
        ]);

        $quicklink = new QuickLink();

        $quicklink->title = $request->title;
        $quicklink->details = $request->details;
        $quicklink->slug = $request->slug;
        $quicklink->status = $request->status;
        $quicklink->created_by = Auth::guard('admin')->User()->id;
        $quicklink->save();
        return back()->with('quick_link_created_successfully', 'Quick Link Created Successfully');
    }

    /**
     * show  a form for editing
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('quickLink.edit')) {
            abort(403, 'Unauthorized access');
        }
        $quicklink = $this->specificItem($id);
        return view('admin.pages.quick_link.edit', [
            'quicklink' => $quicklink
        ]);
    }

    /**
     * update a specific item
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('quickLink.edit')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
            'slug' => 'required|unique:quick_links,slug,' . $id,

        ]);

        $quicklink = $this->specificItem($id);

        $quicklink->title = $request->title;
        $quicklink->details = $request->details;
        $quicklink->slug = $request->slug;
        $quicklink->status = $request->status;
        $quicklink->edited_by = Auth::guard('admin')->User()->id;
        $quicklink->save();

        return back()->with('quick_link_update_success', 'Quick Link Updated Successfully');
    }

    /**
     * statusupdate
     */
    public function statusUpdate($id)
    {
        if (is_null($this->user) || !$this->user->can('quickLink.edit')) {
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
     * show a specific quickLink
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('quickLink.all')) {
            abort(403, 'Unauthorized access');
        }
        $quicklink = $this->specificItem($id);
        return view('admin.pages.quick_link.show', [
            'quicklink' => $quicklink
        ]);
    }

    /**
     * destroy a specific quickLink
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('quickLink.delete')) {
            abort(403, 'Unauthorized access');
        }
        try {
            $quickLink = $this->specificItem($id);
            $quickLink->delete();
            return back()->with('quick_link_deleted_successfully', 'Quick Link Deleted Successfully');
        } catch (Exception $e) {

            if ($e->errorInfo[1] == 1451) {
                return back()->with('please_delete_everything_all_relatedted_resource_first', 'First Delete Everything, which is under this category!!!');
            } else {
                return back()->with('someting_wrong', 'Something Worng!!');
            }
        }
    }

    /**
     * return a specific category
     */
    public function specificItem($id)
    {
        return QuickLink::with(['createdBy', 'editedby'])->findOrFail($id);
    }
}
