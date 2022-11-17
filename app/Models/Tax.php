<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    const ACTIVE_TAX = 'Active';
    const DEACTIVE_TAX = 'Deactive';

    protected $guarded = [

    ];
    /**
     * category who create this
     */
    public function createdBy(){
        return $this->belongsTo('App\Models\Admin','created_by','id');
    }
    /**
     * category who edit this
     */
    public function editedBy(){
        return $this->belongsTo('App\Models\Admin','edited_by','id');
    }

    /**
     * get active data
     */
    public function getActive(){
        return Tax::ACTIVE_TAX;
    }
    /**
     * get active data
     */
    public function getDeactive(){
        return Tax::DEACTIVE_TAX;
    }
    /**
     * return true for active user
     */
    public function isActive(){
        return $this->status == Tax::ACTIVE_TAX;
    }

    /**
     * return true for dactive user
     */
    public function isDeactive(){
        return $this->status == Tax::DEACTIVE_TAX;
    }
}
