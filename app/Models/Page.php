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
        'thumbnail'
    ];
    public function user(){
        return $this->belongsTo(User::class,'posted_by');
    }
}
