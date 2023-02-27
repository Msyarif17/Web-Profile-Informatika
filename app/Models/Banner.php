<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title_1',
        'title_2',
        'title_3',
        'image',
        'button_title',
        'button_color',
        'url',
        'page_id',
        'post_id',
        'text_button_color'
    ];
    public function page(){
        return $this->hasOne(Page::class);
    }
    public function post(){
        return $this->hasOne(Post::class);
    }
}
