<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    const ACTIVE_COUPON = 'Active';
    const DEACTIVE_COUPON = 'Deactive';

    const FLAT_COUPON = 'Flat';
    const PERCENT_COUPON = 'Percent';

    protected $guarded = [];
    /**
     * Get the coupon expiration create at time.
     */
    /**
     * coupon who create this
     */
    public function createdBy()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by', 'id');
    }
    /**
     * coupon who edit this
     */
    public function editedBy()
    {
        return $this->belongsTo('App\Models\Admin', 'edited_by', 'id');
    }
    /**
     * get active data
     */
    public function getActive()
    {
        return Coupon::ACTIVE_COUPON;
    }
    /**
     * get active data
     */
    public function getDeactive()
    {
        return Coupon::DEACTIVE_COUPON;
    }

    /**
     * return true for active user
     */
    public function isActive()
    {
        return $this->status == Coupon::ACTIVE_COUPON;
    }

    /**
     * return true for dactive user
     */
    public function isDeactive()
    {
        return $this->status == Coupon::DEACTIVE_COUPON;
    }

    /**
     * get discount type data
     */
    public function getFlat()
    {
        return Coupon::FLAT_COUPON;
    }
    /**
     * get discount type  data
     */
    public function getPercent()
    {
        return Coupon::PERCENT_COUPON;
    }
    /**
     * return true for discount type flat coupon
     */
    public function isFlat()
    {
        return $this->discount_type == Coupon::FLAT_COUPON;
    }

    /**
     * return true for discount type percnt coupon
     */
    public function isPercent()
    {
        return $this->discount_type == Coupon::PERCENT_COUPON;
    }

    /**
     * Get the expiration date time.
     *
     * @return string expiration_date
     */
    public function getExpirationDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-M-d h:i:s A');
    }
}
