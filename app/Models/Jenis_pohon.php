<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_pohon extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'nama';
    }

    public function pohon()
    {
        return $this->hasMany(Pohon::class);
    }

    public function kelompok_tanaman()
    {
        return $this->belongsTo(Kelompok_tanaman::class);
    }
}
