<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminSubscribeController extends Controller
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
     * show all slider order by desc
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('subscribe.index')) {
            abort(403, 'Unauthorized access');
        }
        $subscribes = Subscribe::latest()->get();
        return view('admin.pages.subscribe.index', [
            'subscribes' => $subscribes
        ]);
    }
    /**
     * destroy a specific slider
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('subscribe.delete')) {
            abort(403, 'Unauthorized access');
        }
        try {
            $subscribe = $this->specificItem($id);
            $subscribe->delete();

            return back()->with('subscribe_deleted_successfully', 'Subscribe Deleted Successfully');
        } catch (Exception $e) {

            if ($e->errorInfo[1] == 1451) {
                return back()->with('please_delete_everything_all_relatedted_resource_first', 'First Delete Everything, which is under this category!!!');
            } else {
                return back()->with('someting_wrong', 'Something Worng!!');
            }
        }
    }
    /**
     * return a specific slider
     */
    public function specificItem($id)
    {
        return Subscribe::findOrFail($id);
    }
}
