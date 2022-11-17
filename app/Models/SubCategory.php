<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class SubCategory extends Model
{
    use HasFactory;
    
    const ACTIVE_SUB_CATEGORY = 'Active';
    const DEACTIVE_SUB_CATEGORY = 'Deactive';

    protected $guarded = [

    ];

    /**
     * @return category;
     */
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
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
        return SubCategory::ACTIVE_SUB_CATEGORY;
    }
    /**
     * get active data
     */
    public function getDeactive(){
        return SubCategory::DEACTIVE_SUB_CATEGORY;
    }
    /**
     * return true for active user
     */
    public function isActive(){
        return $this->status == SubCategory::ACTIVE_SUB_CATEGORY;
    }

    /**
     * return true for dactive user
     */
    public function isDeactive(){
        return $this->status == SubCategory::DEACTIVE_SUB_CATEGORY;
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
    /**
     * Set the category meta keyword.
     *
     * @param  string  $value
     * @return void
     */
    public function setMetaKeywordsAttribute($value)
    {
        $this->attributes['meta_keywords'] =  implode(',',collect(json_decode($value))->pluck('value')->toArray());
    }

    public function childCategory(){
        return $this->hasMany('App\Models\SubCategory','sub_category_id','id');
    }

}
