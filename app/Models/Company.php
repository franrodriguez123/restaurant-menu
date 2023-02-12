<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'email',
        'phone',
        'whatsapp',
        'address',
        'postal_code',
        'city',
        'state',
        'country',
        'schedule',
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_youtube',
    ];
}
