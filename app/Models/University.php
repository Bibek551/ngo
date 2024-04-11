<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'country',
        'other_image',
        'order',
        'link',
        'description',
        'short_description',

        'seo_title',
        'meta_description',
        'meta_keywords'
    ];
}
