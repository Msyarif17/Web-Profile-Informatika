<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'category_post_id',
        'title',
        'slug',
        'content',
        'user_id',
        'banner',
        'thumbnail'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tag(){
        return $this->belongsToMany(Tag::class,'tag_details');
    }
    public function category(){
        return $this->belongsTo(CategoryPost::class);
    }
}
