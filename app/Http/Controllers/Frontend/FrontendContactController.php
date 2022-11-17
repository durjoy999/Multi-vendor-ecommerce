<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class FrontendContactController extends Controller
{
    public function index(){
        return view('frontend.pages.contact.index');
    }

    /**
     * store into specific database
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // die();
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'massage' => 'required|string|max:250'
        ]);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->massage = $request->massage;
        $contact->save();

        return back()->with('message_submit_successfully', 'Message Submit Successfully');
    }
}
