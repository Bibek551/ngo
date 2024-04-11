<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCountry extends Model
{
    use HasFactory;
      protected $fillable = [
        'country_id',
        'image',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('admin/images/country/' .  $value);
        }
        return NULL;
    }
}