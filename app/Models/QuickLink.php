<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QuickLink extends Model
{
    use HasFactory;

    const ACTIVE_QUICKLINk = 'Active';
    const DEACTIVE__QUICKLINk = 'Deactive';

    protected $guarded = [];
    /**
     * quick link who create this
     */
    public function createdBy()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by', 'id');
    }
    /**
     * quick link who edit this
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
        return QuickLink::ACTIVE_QUICKLINk;
    }
    /**
     * get active data
     */
    public function getDeactive()
    {
        return QuickLink::DEACTIVE__QUICKLINk;
    }
    /**
     * return true for active quick link
     */
    public function isActive()
    {
        return $this->status == QuickLink::ACTIVE_QUICKLINk;
    }

    /**
     * return true for dactive quick link
     */
    public function isDeactive()
    {
        return $this->status == QuickLink::DEACTIVE__QUICKLINk;
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
