<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pohon extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName() 
    {
        return 'kode_pohon';
    }

    public function jenis_pohon()
    {
        return $this->belongsTo(Jenis_pohon::class);
    }

    public function kawasan()
    {
        return $this->belongsTo(Kawasan::class);
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
