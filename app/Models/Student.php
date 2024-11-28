<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'nis', 'email', 'contact', 'gender', 'password', 'classroom_id'];

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ekstras() {
        return $this->belongsToMany(Extraculicular::class, 'ekstras_student');
    }

}
