<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Level;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'brief',
        'overview',
        'title_ar',
        'brief_ar',
        'overview_ar',
        'duration',
        'started_at',
        'isReady',
        'patch',
        'home_arrangment',
        'doesShow',
        'faq_type',
        'course_type',
    ];

    /**
     * Get all of the comments for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function levels()
    {
        return $this->hasMany('App\Models\Level', 'course_id');
    }
    public function objectives()
    {
        return $this->hasMany('App\Models\Objective', 'course_id');
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'course_id');
    }
    public function patches()
    {
        return $this->hasMany('App\Models\Patch', 'course_id');
    }
    public function FAQ()
    {
        return $this->hasMany('App\Models\CoursesFAQ', 'course_id');
    }


    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope('excludeWorkShop', function (Builder $builder) {
            // Only apply this scope if the user is not an admin
                $builder->where('course_type',  null);
        });

    }

}
