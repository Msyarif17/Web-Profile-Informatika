<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryMenu extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'url_target',
        'page_id'
    ];
    public function menu(){
        return $this->hasMany(Menu::class);
    }
    public function page()
    {
        return $this->hasOne(Page::class);
    }
}
