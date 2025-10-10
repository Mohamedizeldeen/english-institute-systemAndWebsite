<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'payment_method',
        'status',
        'payment_date',
        'amount',
    ];

    function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
