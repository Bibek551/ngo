<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'image',
        'banner_image',
        'order',
        'status',
        'description',
        'benefits',
        'short_description',
        'slug',

        'seo_title',
        'meta_description',
        'meta_keywords'
    ];
}