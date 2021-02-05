<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    protected $fillable = [
        'image', 'series_id'
    ];

    public function series() {
        return $this->belongsTo(Series::class);
    }
}
