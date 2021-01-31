<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_url', 'chapter_id', 'image_name'
    ];

    public function chapter() {
        return $this->belongsTo(Chapter::class);
    }

    
}
