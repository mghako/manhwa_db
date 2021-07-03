<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'status_id', 'category_id', 'thumbnail', 'released_date', 'user_id', 'description'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function thumbnail() {
        return $this->hasOne(Thumbnail::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function chapters() {
        return $this->hasMany(Chapter::class)->orderBy('name');
    }
}