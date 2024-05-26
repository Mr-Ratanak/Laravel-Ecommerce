<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "category_tbl";
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];

    public function products(){
        return $this->hasMany(Products::class,'category_tbl_id','id');
    }
    public function relatedProducts(){
        return $this->hasMany(Products::class,'category_tbl_id','id')->where('status',0)->latest()->take(14);
    }
    public function brands(){
        return $this->hasMany(Brand::class,'category_id','id')->where('status','0');
    }
}
