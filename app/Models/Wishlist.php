<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Products;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = "wishlists_tbl";
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function product_wishlist():BelongsTo
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }
    
}
