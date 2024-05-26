<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products_tbl';
    protected $fillable = [
        'category_tbl_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'featured',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function Category(){
        return $this->belongsTo(Category::class,'category_tbl_id','id');
    }
    public function productImages(){
        return $this->hasMany(productImages::class,'products_tbl_id','id');
    }
    public function productColors(){
        return $this->hasMany(productColors::class,'products_tbl_id','id');
    }
  


}
