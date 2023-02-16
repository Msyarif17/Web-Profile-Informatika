<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubMenu extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'menu_id',
        'name',
        'slug',
        'url_target',
        'page_id'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    public function page()
    {
        return $this->hasOne(Page::class);
    }
}
