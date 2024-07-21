<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "email",
        "course",
        "rate",
        "dob",
        'gender',
        'country',
        'governante',
        'address',
        'qualification',
        'attended',
        'graduation',
        'prev_education',
        'job',
        'organization_name',
        'duration_of_employment',
        'subject_studied',
    ];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'applicant_id');
    }
}
