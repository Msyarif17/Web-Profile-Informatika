<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'posted_by',
        'banner',
        'thumbnail',
        'category_menu_id',
        'menu_id',
        'sub_menu_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'posted_by');
    }
    public function categoryMenu(){
        return $this->hasMany(CategoryMenu::class);
    }
    public function menu(){
        return $this->hasMany(Menu::class);
    }
    public function subMenu(){
        return $this->hasMany(SubMenu::class);
    }
    
}
