<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extraculicular extends Model
{
    public function student() {
        return $this->hasMany(Student::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
