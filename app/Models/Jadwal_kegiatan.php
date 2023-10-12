<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_kegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenis_pohon()
    {
        return $this->belongsTo(Jenis_pohon::class);
    }

    public function status_kawasan()
    {
        return $this->belongsTo(Status_Kawasan::class);
    }

    public function pengelola()
    {
        return $this->belongsTo(Pengelola::class);
    }
}
