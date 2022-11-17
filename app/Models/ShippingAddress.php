<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

     /**
     * reference on user 
     */
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    

     //relaitons with division table
     public function divisions(){
        return $this->belongsTo('App\Models\Division','division_id','id');
    }

    //realtions with district table
    public function districts(){
        return $this->belongsTo('App\Models\District','district_id','id');
    }

    //relations with upazilas table
    public function upazilas(){
        return $this->belongsTo('App\Models\Upazila','thana_id','id');
    }
}
