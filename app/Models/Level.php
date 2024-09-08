<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Level extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        "title",
        "overview",
        "duration",
        "num_sessions",
        "course_id",
        "major_id",
    ];

    public $timestamps = false;

    public function objectives()
    {
        return $this->hasMany('App\Models\Objective', 'level_id');
    }
}
