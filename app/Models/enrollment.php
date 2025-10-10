<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enrollment extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'enrollment_date',
        'status',
        'expiration_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
