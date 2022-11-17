<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserMassage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminUserMassageController extends Controller
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
     * show all ticket order by desc
     */
    public function index()
    {

        if (is_null($this->user) || !$this->user->can('userMassage.all')) {
            abort(403, 'Unauthorized access');
        }
         $userMassages = UserMassage::with(['replyBy', 'userId'])->latest()->get();
        return view('admin.pages.user_massage.index', [
            'userMassages' => $userMassages
        ]);
    }
    /**
     * show a specific ticket
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('userMassage.all')) {
            abort(403, 'Unauthorized access');
        }
        $userMassage = $this->specificItem($id);
        return view('admin.pages.user_massage.show', [
            'userMassage' => $userMassage
        ]);
    }
    /**
     * show a specific ticket reply
     */
    public function showReply($id)
    {
        if (is_null($this->user) || !$this->user->can('userMassage.all')) {
            abort(403, 'Unauthorized access');
        }
        $userMassage = $this->specificItem($id);
        return view('admin.pages.user_massage.showreply', [
            'userMassage' => $userMassage
        ]);
    }
    /**
     *  single user ticket details data show
     * */

    public function allMassage($id)
    {
        if (is_null($this->user) || !$this->user->can('userMassage.sendMail')) {
            abort(403, 'Unauthorized access');
        }
        $userMassage =  UserMassage::where('id', $id)->first();
        return view('admin.pages.user_massage.reply', [
            'userMassage' => $userMassage,
        ]);
    }
    /**
     * user contact details & admin put massage send mail
     */
    public function allReply(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('userMassage.sendMail')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'reply' => 'required'
        ]);
        //reply massage save
        $userMassage = $this->specificItem($request->user_id);
        if ($userMassage->reply == '') {
            $userMassage->reply = $request->reply;
            $userMassage->status = "Reply";
            $userMassage->reply_by = Auth::guard('admin')->User()->id;
            $userMassage->save();

           UserMassage::findOrFail($request->user_id);

        } else {
            return back()->with('already_submit_reply', 'Already Message Send to this Customer.');
        }
        return back()->with('contact_email_send_success', 'Mail send Contact Details');
    }
    /**
     * destroy a specific slider
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('slider.delete')) {
            abort(403, 'Unauthorized access');
        }
        try {
            $userMassage = $this->specificItem($id);
            $userMassage->delete();
            Storage::delete($userMassage->image);

            return back()->with('user_massage_deleted_successfully', 'User Massage Deleted Successfully');
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
        return UserMassage::with(['replyBy', 'userId'])->findOrFail($id);
    }
}
