<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'logo',
        'description',
        'short_description',
        'slug',
        'order',
        'status',

        'seo_title',
        'meta_description',
        'meta_keywords'
    ];
}
