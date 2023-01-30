<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomUserInterface extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'logo',
        'logo_name',
        'favicon',
        'theme_name',
        'navbar_color',
        'navbar_text_color',
        'video_thumbnail',
        'background_color',
        'card_color',
        'card_text_color',
        'button_color',
        'font',
        'footer_color',
        'footer_text_color',
        'isActive',
    ];
}
