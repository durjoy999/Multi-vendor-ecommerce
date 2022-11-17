<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    const ACTIVE_TEAM = 'Active';
    const DEACTIVE_TEAM = 'Deactive';

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
        return Team::ACTIVE_TEAM;
    }
    /**
     * get active data
     */
    public function getDeactive()
    {
        return Team::DEACTIVE_TEAM;
    }
    /**
     * return true for active user
     */
    public function isActive()
    {
        return $this->status == Team::ACTIVE_TEAM;
    }

    /**
     * return true for dactive user
     */
    public function isDeactive()
    {
        return $this->status == Team::DEACTIVE_TEAM;
    }
}
