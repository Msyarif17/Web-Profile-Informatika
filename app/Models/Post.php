<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\CategoryPost;
use Shetabit\Visitor\Traits\Visitable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,SoftDeletes,Visitable;
    protected $fillable = [
        'category_post_id',
        'title',
        'slug',
        'content',
        'posted_by',
        'banner',
        'thumbnail'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'posted_by');
    }
    public function tag(){
        return $this->belongsToMany(Tag::class,'tag_details');
    }
    public function category(){
        return $this->belongsTo(CategoryPost::class,'category_post_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
