<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
