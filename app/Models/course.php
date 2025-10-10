<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'level_id',
        'teacher_id',
        'title',
        'description',
        'price',
        'duration',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
