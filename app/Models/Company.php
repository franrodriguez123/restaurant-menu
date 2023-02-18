<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected function fullAddress(): Attribute
    {
        return Attribute::get(function() {
            return $this->attributes['address'] . ', ' 
                . $this->attributes['postal_code'] . ' ' . $this->attributes['city'] . ' '
                . $this->attributes['state'] . ' ' . $this->attributes['country'];
        });
    }
}
