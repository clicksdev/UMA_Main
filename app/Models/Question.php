<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        "question",
        "answer",
        "note",
        "type",
        "major_id",
        "course_id"
    ];
}
