<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Level;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Major extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'brief',
        'overview',
        'duration',
        'started_at',
        'isReady',
        'patch',
        'home_arrangment',
    ];

    /**
     * Get all of the comments for the Major
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function levels()
    {
        return $this->hasMany('App\Models\Level', 'major_id');
    }
    public function objectives()
    {
        return $this->hasMany('App\Models\Objective', 'major_id');
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'major_id');
    }
}
