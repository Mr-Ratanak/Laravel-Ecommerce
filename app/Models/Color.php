<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;
    protected $table = 'color_tbl';
    protected $fillable = [
        'name',
        'code',
        'status',
    ];
   
}