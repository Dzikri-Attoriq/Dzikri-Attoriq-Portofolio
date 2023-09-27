<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Kelompok_tanaman;
use App\Models\Jenis_pohon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KelompokTanamanController extends Controller
{
    public function index()
    {
        try {
            $data = Kelompok_tanaman::all();
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
            'nama' => 'required|unique:kelompok_tanamans'
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'invalid',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $kelompok_tanaman = Kelompok_tanaman::create(['nama' => $request->nama]);
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $kelompok_tanaman
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show(Kelompok_tanaman $kelompok_tanaman)
    {
        if($kelompok_tanaman !== null) {
            return response()->json([
                'message' => 'success',
                'data' => $kelompok_tanaman
            ]);
        } else {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }
    }

    public function update(Request $request, Kelompok_tanaman $kelompok_tanaman)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);
        if($request->nama != $kelompok_tanaman->nama) {
            $validator->addRules(['nama' => 'required|unique:kelompok_tanamans']);
        }
        if($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $kelompok_tanaman->update(['nama' => $request->nama]);
            
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $kelompok_tanaman
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Kelompok_tanaman $kelompok_tanaman)
    {
        if(!$kelompok_tanaman) {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }

        DB::beginTransaction();
        try {
            $relasi = Jenis_pohon::select('kelompok_tanaman_id')->where('kelompok_tanaman_id', $kelompok_tanaman->id)->count();
            if($relasi > 0) {
                return response()->json([
                    'message' => 'data telah di pakai di data jenis pohon, tidak bisa di hapus'
                ]);
            } 
            $kelompok_tanaman->delete();
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $kelompok_tanaman
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
