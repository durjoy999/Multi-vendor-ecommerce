<?php
namespace App\Repositories;

use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class CouponRepository{

    /**
     * edit 
     */
    public function edit($request, $id){
        $coupon = Coupon::findOrFail($id);

        if($request->number_of_times > $coupon->number_of_times){

            $totalIncrement = $request->number_of_times - $coupon->number_of_times;
            $coupon->number_of_times =  $coupon->number_of_times + $totalIncrement;
            $coupon->number_of_times_remaining = $coupon->number_of_times_remaining + $totalIncrement;
        }
        else{

            $totalDecrement =  $coupon->number_of_times - $request->number_of_times;
            $coupon->number_of_times =  $coupon->number_of_times - $totalDecrement;
            $total_times_remaining = $coupon->number_of_times_remaining - $totalDecrement;

            if($total_times_remaining <= 0){

                $total_times_remaining = 0;
            }
            $coupon->number_of_times_remaining = $total_times_remaining;
        }
        $coupon->title = $request->title;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount_amount = $request->discount_amount;
        if($request->expiration_date != ""){
            $coupon->expiration_date = $request->expiration_date;
        }
        $coupon->status = $request->status;
        $coupon->edited_by = Auth::guard('admin')->User()->id;
        $coupon->save();
    }
}