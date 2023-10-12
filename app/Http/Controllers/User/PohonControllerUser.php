<?php

namespace App\Http\Controllers\User;

use App\Models\Pohon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PohonControllerUser extends Controller
{
    public function profil_pohon()
    {
        $data['title'] = "Pilih Profil Pohon";
        $data['data_pohons'] = Pohon::with([
            'jenis_pohon' => function ($query) {
                $query->orderBy('nama');
            },
            'kawasan' => function ($query) {
                $query->orderBy('nama');
            },
            'status_kawasan','pengelola', ])->paginate();
        
        return view('user/master_data.pohon.pilih_profil', $data);
    }

    public function pilih_pohon()
    {
        $data['title'] = "Pilih Pohon";
        
        return view('user/master_data.pohon.pilih_pohon', $data);
    }
    
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'jenis_pohon_id' => 'required',
            'kawasan_id' => 'required',
            'status_kawasan_id' => 'required',
            'umur_pohon' => 'required|integer',
            'pengelola_id' => 'required',
            'koordinat' => 'required',
        ]);

        if ($validate->fails()) {
            // Jika validasi gagal, kirim pesan kesalahan dalam respons JSON
            return response()->json(['errors' => $validate->errors()], 422);
        }
        
        Pohon::create([
            'jenis_pohon_id' => $request->jenis_pohon_id,
            'kawasan_id' => $request->kawasan_id,
            'status_kawasan_id' => $request->status_kawasan_id,
            'umur_pohon' => $request->umur_pohon,
            'pengelola_id' => $request->pengelola_id,
            'koordinat' => $request->koordinat,
        ]);
        
        return response()->json(['message' => 'Berhasil menambahkan data pohon'], 200);
    }
}
