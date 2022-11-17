<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use Illuminate\Support\Facades\Mail;
use App\Mail\usermail;
use App\Notifications\UserAccountStatus;
use App\Notifications\UserAccountStatusNotification;

class UserController extends Controller
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
     * show all user order by desc
     */
    public function index(){
        if(is_null($this->user) || !$this->user->can('user.all')){
            abort(403,'Unauthorized access');
        }
        $users = User::with(['admin','shippingAddress','billingAddress'])->latest()->get();
        return view('admin.pages.user.index',[
            'users' => $users
        ]);
    }

    /**
     * active or deactive current users
     */
    public function statusUpdate($id){
        if(is_null($this->user) || !$this->user->can('user.edit')){
            abort(403,'Unauthorized access');
        }
        $user = User::where('id',$id)->first();
        if($user->isActive()){
            User::where('id',$id)->update([
                'status' => User::DEACTIVE_USER
            ]);
        }
        else{
            User::where('id',$id)->update([
                'status' => User::ACTIVE_USER
            ]);
        }

        //sending mail to user
        $user = User::findOrFail($id);
        $user->notify(new UserAccountStatusNotification($user));

        return back()->with('status_update_successfully','Status Updated Successfully');
    }

    /**
     * show use details
     */
    public function show($id){
        if(is_null($this->user) || !$this->user->can('user.all')){
            abort(403,'Unauthorized access');
        }
        $user = User::with(['admin','shippingAddress','billingAddress'])->findOrFail($id);
        return view('admin.pages.user.show',[
            'user' => $user
        ]);
    }

    /**
     * destory a single user
     */
    public function destroy($id){
        if(is_null($this->user) || !$this->user->can('user.delete')){
            abort(403,'Unauthorized access');
        }
        $user = User::findOrFail($id);
        if($user->image != 'default.png'){
            Storage::delete($user->image);
        }
        $user->delete();
        $user->notify(new UserAccountStatusNotification($user));
        return back()->with('user_deleted_successfully','User Deleted Successfully');
    }
}
