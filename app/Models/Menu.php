<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'category_menu_id',
        'name',
        'url_target',
        'slug',
        'page_id'
    ];
    public function categoryMenu(){
        return $this->belongsTo(CategoryMenu::class, 'category_menu_id');
    }
    public function subMenu(){
        return $this->hasMany(SubMenu::class);
    }
    public function page()
    {
        return $this->hasOne(Page::class);
    }
}
