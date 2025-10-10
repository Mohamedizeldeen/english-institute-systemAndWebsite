<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videoLessons extends Model
{
    protected $table = 'video-lessons';

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'video_url',
        'duration',
        'thumbnail_url',
        'order_index',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
