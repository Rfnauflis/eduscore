<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function extraculicular() {
        return $this->hasMany(Extraculicular::class);
    }
}
