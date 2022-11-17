<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model
{
    use HasFactory;

    const ACTIVE_CATEGORY = 'Active';
    const DEACTIVE_CATEGORY = 'Deactive';

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
        return Category::ACTIVE_CATEGORY;
    }
    /**
     * get active data
     */
    public function getDeactive(){
        return Category::DEACTIVE_CATEGORY;
    }
    /**
     * return true for active user
     */
    public function isActive(){
        return $this->status == Category::ACTIVE_CATEGORY;
    }

    /**
     * return true for dactive user
     */
    public function isDeactive(){
        return $this->status == Category::DEACTIVE_CATEGORY;
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
    //  /**
    //  * Get the user's create at time.
    //  *
    //  * @return string
    //  */
    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-M-Y h:i:s A');
    // }

    public function subCategory(){
        return $this->hasMany('App\Models\SubCategory','category_id','id');
    }
}
