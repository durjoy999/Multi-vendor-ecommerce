<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Faq extends Model
{
    use HasFactory;

    const ACTIVE_FAQ = 'Active';
    const DEACTIVE_FAQ = 'Deactive';

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
        return Faq::ACTIVE_FAQ;
    }
    /**
     * get active data
     */
    public function getDeactive()
    {
        return Faq::DEACTIVE_FAQ;
    }

    /**
     * return true for active Faq
     */
    public function isActive()
    {
        return $this->status == Faq::ACTIVE_FAQ;
    }

    /**
     * return true for dactive Faq
     */
    public function isDeactive()
    {
        return $this->status == Faq::DEACTIVE_FAQ;
    }
    /**
     * Set the slug .
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] =   Str::slug($value, '-');
    }
}
