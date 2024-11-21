<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patch extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'start_at',
        'end_at',
    ];

    public $timestamps = false;
}
