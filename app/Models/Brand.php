<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;
    const ACTIVE_BRAND = 'Active';
    const DEACTIVE_BRAND = 'Deactive';

   protected $guarded = [

   ];
   /**
    * brand who create this
    */
   public function createdBy(){
       return $this->belongsTo('App\Models\Admin','created_by','id');
   }
   /**
    * brand who edit this
    */
   public function editedBy(){
       return $this->belongsTo('App\Models\Admin','edited_by','id');
   }

   /**
    * get active data
    */
   public function getActive(){
       return Brand::ACTIVE_BRAND;
   }
   /**
    * get active data
    */
   public function getDeactive(){
       return Brand::DEACTIVE_BRAND;
   }
   /**
    * return true for active user
    */
   public function isActive(){
       return $this->status == Brand::ACTIVE_BRAND;
   }

   /**
    * return true for dactive user
    */
   public function isDeactive(){
       return $this->status == Brand::DEACTIVE_BRAND;
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
    * Set the brand meta keyword.
    *
    * @param  string  $value
    * @return void
    */
   public function setMetaKeywordsAttribute($value)
   {
       $this->attributes['meta_keywords'] =  implode(',',collect(json_decode($value))->pluck('value')->toArray());
   }
    /**
    * Get the user's create at time.
    *
    * @return string
    */
   public function getCreatedAtAttribute($value)
   {
       return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-M-Y h:i:s A');
   }
}
