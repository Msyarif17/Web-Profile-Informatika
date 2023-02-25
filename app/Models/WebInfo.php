<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'short_address',
        'phone_number',
        'major_name',
        'logo',
        'social_media_id'
    ];
    public function socialmedia(){
        return $this->hasMany(SocialMedia::class);
    }
}
