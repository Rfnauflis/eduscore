<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extraculicular extends Model
{
    use HasFactory;
     
    protected $fillable = ['name', 'admin_id'];


    public function student() {
        return $this->belongsToMany(Student::class, 'ekstras_student');
    }

    public function pembina(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
