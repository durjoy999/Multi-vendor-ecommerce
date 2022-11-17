<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMassage extends Model
{
    use HasFactory;


    protected $guarded = [];

    /**
     * slider who create this
     */
    public function replyBy()
    {
        return $this->belongsTo('App\Models\Admin', 'reply_by', 'id');
    }
    /**
     * user who edit this
     */
    public function userId()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
