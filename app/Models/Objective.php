<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "name_ar",
        "level_id",
        "course_id",
        "major_id"
    ];

    public $timestamps = false;
}
