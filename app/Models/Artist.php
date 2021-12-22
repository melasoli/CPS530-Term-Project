<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    // Get paintings created by artist
    public function paintings()
    {
        return $this->hasMany(Painting::class);
    }
}