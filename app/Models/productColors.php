<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class productColors extends Model
{
    use HasFactory;
    protected $table = 'products_color_tbl';
    protected $fillable = [
        'products_tbl_id',
        'colors_id',
        'quantity'
    ];

    public function color():BelongsTo{
        return $this->belongsTo(Color::class,'colors_id','id');
    }

}
