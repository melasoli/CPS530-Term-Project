<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'creation',
        'path',
        'artist_id'
    ];

    // Get artist that created painting
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
