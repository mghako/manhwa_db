<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    protected $fillable = [
        'url'
    ];

    public function series() {
        return $this->belongsTo(Series::class);
    }
}
