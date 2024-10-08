<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{

    use HasFactory;
    protected $table = "siswa";

    public function nilai()
    {
        return $this->hasMany(Nilai::class, "id_siswa");
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, "id_siswa");
    }
    public function ekstra() {
        return $this->hasMany(Kelas::class, "id_siswa");
    }
}
