<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    const ACTIVE_SLIDER = 'Active';
    const DEACTIVE_SLIDER = 'Deactive';

    protected $guarded = [];

    /**
     * slider who create this
     */
    public function createdBy()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by', 'id');
    }
    /**
     * slider who edit this
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
        return Slider::ACTIVE_SLIDER;
    }
    /**
     * get active data
     */
    public function getDeactive()
    {
        return Slider::DEACTIVE_SLIDER;
    }
    /**
     * return true for active user
     */
    public function isActive()
    {
        return $this->status == Slider::ACTIVE_SLIDER;
    }

    /**
     * return true for dactive user
     */
    public function isDeactive()
    {
        return $this->status == Slider::DEACTIVE_SLIDER;
    }
}
