<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TagDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'post_id',
        'tag_id'
    ];
    
}
