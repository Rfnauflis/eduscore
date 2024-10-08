<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eksra extends Model
{

    use HasFactory;
    protected $table = "Ekstra";

    public function siswa() {
        return $this->belongsTo(Siswa::class, "id_siswa");
    }
    public function pembina() {
        return $this->belongsTo(Pembina::class, "id_pembina");
    }
}
