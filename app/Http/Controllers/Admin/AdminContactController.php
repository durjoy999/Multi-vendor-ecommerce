<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Notifications\UserContactMassageNotification;
use App\Notifications\UserContactMassageSend;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminContactController extends Controller
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
     * show all contact order by desc
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('contact.all')) {
            abort(403, 'Unauthorized access');
        }

         $contacts = Contact::latest()->get();
        return view('admin.pages.contact.index', [
            'contacts' => $contacts
        ]);
    }
    /**
     * show a specific contact
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('contact.sendMail')) {
            abort(403, 'Unauthorized access');
        }
        $contact = $this->specificItem($id);
        //status value update
        $value = 1;
        $contact->status = $value;
        $contact->save();
        return view('admin.pages.contact.show', [
            'contact' => $contact
        ]);
    }
    /**
     *  single user Contact details data show
     * */

    public function allMail($id){
        if (is_null($this->user) || !$this->user->can('contact.sendMail')) {
            abort(403, 'Unauthorized access');
        }
        $contact =  Contact::where('id', $id)->first();
        return view('admin.pages.contact.reply', [
            'contact' => $contact,
        ]);
    }
    /**
     * user contact details & admin put massage send mail
     */
    public function allReply(Request $request){
        if (is_null($this->user) || !$this->user->can('contact.sendMail')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'reply' => 'required',
            'subject' => 'required'
        ]);
        //reply massage save
        $contact = $this->specificItem($request->user_id);
        if($contact->reply == ''){
            $contact->reply = $request->reply;
            $contact->subject = $request->subject;
            $contact->save();
            //sending mail to user
            $info['contact'] = Contact::findOrFail($request->user_id);
            $info['subject'] = $request->subject;

            $contact->notify(new UserContactMassageNotification($info));
        }
        else{
            return back()->with('already_submit_reply','Already Message Send to this Customer.');
        }
        return back()->with('contact_email_send_success', 'Mail send Contact Details');
    }

    /**
     * destroy a specific contact
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('contact.delete')) {
            abort(403, 'Unauthorized access');
        }
        try {
            $contact = $this->specificItem($id);
            $contact->delete();

            return back()->with('contact_deleted_successfully', 'Contact Deleted Successfully');
        } catch (Exception $e) {

            if ($e->errorInfo[1] == 1451) {
                return back()->with('please_delete_everything_all_relatedted_resource_first', 'First Delete Everything, which is under this category!!!');
            } else {
                return back()->with('someting_wrong', 'Something Worng!!');
            }
        }
    }

    /**
     * return a specific contact
     */
    public function specificItem($id)
    {
        return Contact::findOrFail($id);
    }
}
