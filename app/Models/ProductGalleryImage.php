<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGalleryImage extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
