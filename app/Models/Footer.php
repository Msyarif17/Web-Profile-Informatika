<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Footer extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'url',
        'parent_id',
    ];
    public function parent(){
        return $this->hasMany(Footer::class,'id','parent_id');
    }
    public function childrent(){
        return $this->belongsTo(Footer::class,'parent_id');
    }
}
