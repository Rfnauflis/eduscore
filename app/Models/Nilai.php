<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{

    use HasFactory;
    protected $table = "Nilai";

    public function siswa(){
        return $this->belongsTo(Siswa::class,"id_siswa");
    }
}
