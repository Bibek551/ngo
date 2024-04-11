<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'currency',
        'language',
        'timezone',
        'visittime',
        'sliderimage',
        'banner_image',
        'popular_place',
        'order',
        'status',
        'description',
        'visa_process',
        'short_description',

        'seo_title',
        'meta_description',
        'meta_keywords'
    ];
    
    public function galleries()
    {
        return $this->hasMany(GalleryCountry::class, 'country_id');
    }

        public function getImageAttribute($value)
    {
        if ($value) {
            return asset('admin/images/country/' .  $value);
        }
        return NULL;
    }
    
}