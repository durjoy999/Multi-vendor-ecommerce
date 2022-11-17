<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    const ACTIVE_PRODUCT = 'Active';
    const DEACTIVE_PRODUCT = 'Deactive';

    const OFFER_PRODUCT_YES = 'Yes';
    const OFFER_PRODUCT_NO = 'NO';

    protected $guarded = [

    ];
    /**
     * product who create this
     */
    public function createdBy(){
        return $this->belongsTo('App\Models\Admin','created_by','id');
    }
    /**
     * product who edit this
     */
    public function editedBy(){
        return $this->belongsTo('App\Models\Admin','edited_by','id');
    }

    /**
     * has many gallery iamge
     */
    public function galleryImages(){
        return $this->hasMany('App\Models\ProductGalleryImage','product_id','id');
    }

    /**
     * get active data
     */
    public function getActive(){
        return Product::ACTIVE_PRODUCT;
    }
    /**
     * get active data
     */
    public function getDeactive(){
        return Product::DEACTIVE_PRODUCT;
    }
    /**
     * get offer product yes
     */
    public function getOfferProductYes(){
        return Product::OFFER_PRODUCT_YES;
    }
    /**
     * get active data
     */
    public function getOfferProductNo(){
        return Product::OFFER_PRODUCT_NO;
    }
    /**
     * return true for active user
     */
    public function isActive(){
        return $this->status == Product::ACTIVE_PRODUCT;
    }

    /**
     * return true for dactive user
     */
    public function isDeactive(){
        return $this->status == Product::DEACTIVE_PRODUCT;
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
     * Set the product meta keyword.
     *
     * @param  string  $value
     * @return void
     */
    public function setMetaKeywordsAttribute($value)
    {
        $this->attributes['meta_keywords'] =  implode(',',collect(json_decode($value))->pluck('value')->toArray());
    }

    /**
     * brand
     */
    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }
    /**
     * category
     */
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    /**
     * subCategory
     */
    public function subCategory(){
        return $this->belongsTo('App\Models\SubCategory','sub_category_id','id');
    }
    /**
     * child category
     */
    public function childCategory(){
        return $this->belongsTo('App\Models\ChildCategory','child_category_id','id');
    }

}
