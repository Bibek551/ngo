<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'description',
        'short_description',
        'slug',
        
        'seo_title',
        'meta_description',
        'meta_keywords',
        'seo_schema'
    ];
}