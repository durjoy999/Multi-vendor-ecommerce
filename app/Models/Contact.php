<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'contact_name',
        'contact_phone',
        'contact_email',
        'contact_massage',
        'contact_reply'
    ];
}
