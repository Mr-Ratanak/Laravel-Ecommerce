<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_color_id',
        'quantity',
    ];
    public function product_cart():BelongsTo
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }
    public function productColor():BelongsTo
    {
        return $this->belongsTo(Color::class,'product_color_id','id');
    }

}
