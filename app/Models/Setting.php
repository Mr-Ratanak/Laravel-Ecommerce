<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "setting";
    
    protected $fillable = [
        'website_name',
        'website_url',
        'page_title',
        'meta_keyword',
        'meta_description',
        'address',
        'phone_one',
        'phone_two',
        'email_one',
        'email_two',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'linkin',
        'telegram',
    ];

}
