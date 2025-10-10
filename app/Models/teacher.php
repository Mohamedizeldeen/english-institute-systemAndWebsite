<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $fillable = [
        'user_id',
        'qualification',
        'years_of_experience',
        'bio',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
