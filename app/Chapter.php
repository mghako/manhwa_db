<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'name', 'series_id'
    ];

    public function series() {
        return $this->belongsTo(Series::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

}
