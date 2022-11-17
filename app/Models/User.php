<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles,HasApiTokens, HasFactory, Notifiable;

    const ACTIVE_USER = 'Active';
    const DEACTIVE_USER = 'Deactive';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * return true for active user
     */
    public function isActive(){
        return $this->status == User::ACTIVE_USER;
    }

    /**
     * return true for dactive user
     */
    public function isDeactive(){
        return $this->status == User::DEACTIVE_USER;
    }

    // /**
    //  * Get the user's create at time.
    //  *
    //  * @return string
    //  */
    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-M-Y h:i:s A');
    // }

    /**
     * Set the user's pasword.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    //relaitons with division table
    public function divisions(){
        return $this->belongsTo('App\Models\Division','division','id');
    }

    //realtions with district table
    public function districts(){
        return $this->belongsTo('App\Models\District','district','id');
    }

    //relations with upazilas table
    public function upazilas(){
        return $this->belongsTo('App\Models\Upazila','thana','id');
    }

    /**
     * admin who update user status
     */
    public function admin(){
        return $this->belongsTo('App\Models\Admin','updated_by','id');
    }


    /**
     * has one relation with shipping address
     */
    public function shippingAddress(){
        return $this->hasOne('App\Models\ShippingAddress','user_id','id');
    }
    /**
     * has one relation with billing address
     */
    public function billingAddress(){
        return $this->hasOne('App\Models\ShippingAddress','user_id','id');
    }


}
