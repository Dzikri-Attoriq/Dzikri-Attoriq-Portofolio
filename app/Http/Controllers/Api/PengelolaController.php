<?php

namespace App\Http\Controllers\Api;

use App\Models\Pohon;
use App\Models\Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PengelolaController extends Controller
{
    public function index()
    {
        try {
            $data = Pengelola::all();
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
            'nama' => 'required|unique:pengelolas'
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'invalid',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $kawasan = Pengelola::create(['nama' => $request->nama]);
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $kawasan
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show(Pengelola $pengelola)
    {
        if($pengelola !== null) {
            return response()->json([
                'message' => 'success',
                'data' => $pengelola
            ]);
        } else {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }
    }

    public function update(Request $request, Pengelola $pengelola)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);
        if($request->nama != $pengelola->nama) {
            $validator->addRules(['nama' => 'required|unique:pengelolas']);
        }
        if($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $pengelola->update(['nama' => $request->nama]);
            
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $pengelola
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Pengelola $pengelola)
    {
        if(!$pengelola) {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }

        DB::beginTransaction();
        try {
            $relasi = Pohon::select('pengelola_id')->where('pengelola_id', $pengelola->id)->count();
            if($relasi > 0) {
                return response()->json([
                    'message' => 'data telah di pakai di data pohon, tidak bisa di hapus'
                ]);
            } 
            $pengelola->delete();
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $pengelola
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
