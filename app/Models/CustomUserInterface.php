<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomUserInterface extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'logo',
        'favicon',
        'theme_name',
        'video_thumbnail',
        'background_color',
        'card_color',
        'button_color',
        'font',
        'footer_color',
    ];
}
