<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\User;
use App\Models\UserMassage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard
     */
     public function index(){
         $userMassages = UserMassage::with(['replyBy'])->where('user_id',Auth::guard('web')->User()->id)->latest()->paginate(1);
         $shippingAddress = ShippingAddress::with(['divisions','districts','upazilas'])->where('user_id',Auth::guard('web')->User()->id)->first();
         $billingAddress = BillingAddress::with(['divisions','districts','upazilas'])->where('user_id',Auth::guard('web')->User()->id)->first();
         return view('frontend.pages.dashboard.home.index',[
            'shippingAddress' => $shippingAddress,
            'billingAddress' => $billingAddress,
            'userMassages' =>$userMassages
         ]);
     }

     /**
      * profile update
      */
      public function updateProfile(Request $request){
         $request->validate([
            'name'=> 'required',
            'username' => 'required|unique:users,username,'. Auth::guard('web')->User()->id,
            'email' => 'required|unique:users,email,' . Auth::guard('web')->User()->id
         ]);

         $user = User::where('id',Auth::guard('web')->User()->id)->first();

         $user->name = $request->name;
         $user->username = $request->username;
         $user->email = $request->email;
         $user->phone = $request->phone;

         if($request->hasFile('image')){
            if($user->image != 'deafult.png'){
               Storage::delete($user->image);
            }
            $user->image = $request->file('image')->store('/user/photo/profile/');
         }
         if($request->previous_password != ''){
            $request->validate([
               'previous_password' => 'required',
               'password' => 'required|min:8|confirmed'
            ]);

            if (Hash::check($request->previous_password,Auth::guard('web')->User()->password)) {
              $user->password = $request->password;
            }
            else{
               return back()->with('previous_password_does_not_match','Previous Password Does not Match, try again.');
            }
         }

         $user->save();

         return back()->with('profile_updated_successfully','Profile Update Successfully');
      }

      public function storeShippingAddress(Request $request){
         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'address' => 'required'
         ],
         [
            'name.required' => 'name field is required.',
            'phone.required' => 'phone field is required.',
            'division_id.required' => 'division field is required.',
            'district_id.required' => 'disctirct field is required.',
            'thana_id.required' => 'thana field is required.',
            'address.required' => 'address field is required.'
         ]);

         ShippingAddress::create([
            'user_id' => Auth::guard('web')->User()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'thana_id' => $request->thana_id,
            'address' => $request->address
         ]);
         return back()->with('shipping_address_add_successfully','Shipping Address Added Successfully');
      }
      public function updateShippingAddress(Request $request,$id){

         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'address' => 'required'
         ],
         [
            'name.required' => 'name field is required.',
            'phone.required' => 'phone field is required.',
            'division_id.required' => 'division field is required.',
            'district_id.required' => 'disctirct field is required.',
            'thana_id.required' => 'thana field is required.',
            'address.required' => 'address field is required.'
         ]);


         ShippingAddress::where('id',$id)->update([
            'user_id' => Auth::guard('web')->User()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'thana_id' => $request->thana_id,
            'address' => $request->address
         ]);
         return back()->with('shipping_address_update_successfully','Shipping Address Updated Successfully');
      }
      public function storeBillingAddress(Request $request){
         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'address' => 'required'
         ],
         [
            'name.required' => 'name field is required.',
            'phone.required' => 'phone field is required.',
            'division_id.required' => 'division field is required.',
            'district_id.required' => 'disctirct field is required.',
            'thana_id.required' => 'thana field is required.',
            'address.required' => 'address field is required.'
         ]);

         BillingAddress::create([
            'user_id' => Auth::guard('web')->User()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'thana_id' => $request->thana_id,
            'address' => $request->address
         ]);
         return back()->with('billing_address_add_successfully','Billing Address Added Successfully');
      }
      public function updateBillingAddress(Request $request,$id){

         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'address' => 'required'
         ],
         [
            'name.required' => 'name field is required.',
            'phone.required' => 'phone field is required.',
            'division_id.required' => 'division field is required.',
            'district_id.required' => 'disctirct field is required.',
            'thana_id.required' => 'thana field is required.',
            'address.required' => 'address field is required.'
         ]);


         BillingAddress::where('id',$id)->update([
            'user_id' => Auth::guard('web')->User()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'thana_id' => $request->thana_id,
            'address' => $request->address
         ]);
         return back()->with('billing_address_update_successfully','Billing Address Updated Successfully');
      }
    /**
     * show a specific show single view Ticket
     */
    public function viewTicket($id)
    {
        $userMassage = UserMassage::with(['replyBy', 'userId'])->findOrFail($id);
        return view('frontend.pages.dashboard.home.viewticket', [
            'userMassage' => $userMassage
        ]);
    }
    /**
     * user contact details & admin put massage send mail
     */
    public function ticketReply(Request $request)
    {
        $request->validate([
            'massage' => 'required',
            'subject' => 'required'
        ]);
        //reply massage save
            $userMassage = new UserMassage();

            if ($request->hasFile('image')) {
            $userMassage->image = $request->file('image')->store('photo/userMassage');
            }

            $userMassage->massage = $request->massage;
            $userMassage->ticket_number = Str::random(6);
            $userMassage->user_id = Auth::guard('web')->User()->id;
            $userMassage->subject = $request->subject;

            $userMassage->save();
        return back()->with('send_success', 'send Submitted');
    }
    /**
     * show a specific show single view Ticket
     */
    public function showReply($id)
    {
        $userMassage = UserMassage::with(['replyBy', 'userId'])->findOrFail($id);
        return view('frontend.pages.dashboard.home.showreply', [
            'userMassage' => $userMassage
        ]);
    }
}
