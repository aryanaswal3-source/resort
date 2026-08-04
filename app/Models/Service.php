<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'location',
        'is_featured',
        'photo_count',
        'video_count',
        'rating',
        'reviews_count',
        'nights',
        'persons',
        'slug',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'rating'      => 'float',
    ];
}