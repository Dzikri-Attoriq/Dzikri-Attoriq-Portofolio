<?php

namespace App\Http\Controllers\Api;

use App\Models\Pohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PohonController extends Controller
{
    public function index()
    {
        try {
            $data = Pohon::with(['jenis_pohon:id,nama,deskripsi,kelompok_tanaman_id,image', 'jenis_pohon.kelompok_tanaman:id,nama', 'kawasan:id,nama', 'status_kawasan:id,nama', 'pengelola:id,nama'])->get();
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 200);
        } catch (\Throwable $error) {
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pohon_id' => 'required',
            'kawasan_id' => 'required',
            'status_kawasan_id' => 'required',
            'umur_pohon' => 'required|integer',
            'pengelola_id' => 'required',
            'koordinat' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'invalid',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $pohon = Pohon::latest()->first();
            $kode = "A1-B-RTHP-C1-";
            if($pohon == null) {
                $nomor_urut = '00001';
            } else {
                $explode =  explode('-', $pohon->kode_pohon);
                $nomor_urut = intval($explode[4]) + 1;
                $nomor_urut = str_pad($nomor_urut, 5, "0", STR_PAD_LEFT);
            }
            $kode_pohon = $kode.$nomor_urut;
            $pohon = Pohon::create([
                'jenis_pohon_id' => $request->jenis_pohon_id,
                'kawasan_id' => $request->kawasan_id,
                'status_kawasan_id' => $request->status_kawasan_id,
                'kode_pohon' => $kode_pohon,
                'umur_pohon' => $request->umur_pohon,
                'pengelola_id' => $request->pengelola_id,
                'koordinat' => $request->koordinat,
            ]);
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $pohon
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show(Pohon $pohon)
    {
        if($pohon !== null) {
            return response()->json([
                'message' => 'success',
                'data' => $pohon
            ]);
        } else {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }
    }

    public function update(Request $request, Pohon $pohon)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pohon_id' => 'required',
            'kawasan_id' => 'required',
            'status_kawasan_id' => 'required',
            'umur_pohon' => 'required|integer',
            'pengelola_id' => 'required',
            'koordinat' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $pohon->update([
                'jenis_pohon_id' => $request->jenis_pohon_id,
                'kawasan_id' => $request->kawasan_id,
                'status_kawasan_id' => $request->status_kawasan_id,
                'umur_pohon' => $request->umur_pohon,
                'pengelola_id' => $request->pengelola_id,
                'koordinat' => $request->koordinat,
            ]);
            
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $pohon
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Pohon $pohon)
    {
        if(!$pohon) {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }

        DB::beginTransaction();
        try {
            $pohon->delete();
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $pohon
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
