<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Answer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'id',
        'question_id',
        'applicant_id',
        'question_txt',
        'answer',
    ];

    public $timestamps = false;
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
