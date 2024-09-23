<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesFAQ extends Model
{
    use HasFactory;

    protected $fillable = ["question", "answer", "question_ar", "answer_ar", "course_id"];
}
