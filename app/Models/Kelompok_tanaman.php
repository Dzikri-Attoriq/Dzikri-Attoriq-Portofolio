<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok_tanaman extends Model
{
    use HasFactory;
    protected $table = 'kelompok_tanamans';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'nama';
    }

    public function jenis_pohon()
    {
        return $this->hasMany(Jenis_pohon::class);
    }
}
