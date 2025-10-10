<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
