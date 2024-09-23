<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        "question",
        "note_ar",
        "question_ar",
        "answer",
        "note",
        "type",
        "major_id",
        "course_id"
    ];

    public function options()
    {
        return $this->hasMany('App\Models\QuestionsOption', 'question_id');
    }
}
