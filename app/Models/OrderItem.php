<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = "order_item";
    protected $fillable = [
        'order_id',
        'product_id',
        'product_color_id',
        'quantity',
        'price',
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Products::class ,'product_id','id');
    }
    public function productColors():BelongsTo
    {
        return $this->belongsTo(productColors::class ,'product_color_id','id');
    }

}
