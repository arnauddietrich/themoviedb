<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'adult',
        'backdrop_path',
        'title',
        'original_language',
        'original_title',
        'overview',
        'poster_path',
        'media_type',
        'genre_ids',
        'popularity',
        'release_date',
        'first_air_date',
        'video',
        'vote_average',
        'vote_count',
        'origin_country'
    ];

    protected function data(): Attribute{
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value)
        );
    }
}
