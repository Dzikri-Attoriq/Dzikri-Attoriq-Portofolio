<?php

namespace App\Http\Controllers\Api;

use App\Models\Pohon;
use App\Models\Kawasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KawasanController extends Controller
{
    public function index()
    {
        try {
            $data = Kawasan::all();
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
            'nama' => 'required|unique:kawasans'
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'invalid',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $kawasan = Kawasan::create(['nama' => $request->nama]);
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

    public function show(Kawasan $kawasan)
    {
        if($kawasan !== null) {
            return response()->json([
                'message' => 'success',
                'data' => $kawasan
            ]);
        } else {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }
    }

    public function update(Request $request, Kawasan $kawasan)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);
        if($request->nama != $kawasan->nama) {
            $validator->addRules(['nama' => 'required|unique:kawasans']);
        }
        if($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $kawasan->update(['nama' => $request->nama]);
            
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

    public function destroy(Kawasan $kawasan)
    {
        if(!$kawasan) {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }

        DB::beginTransaction();
        try {
            $relasi = Pohon::select('kawasan_id')->where('kawasan_id', $kawasan->id)->count();
            if($relasi > 0) {
                return response()->json([
                    'message' => 'data telah di pakai di data pohon, tidak bisa di hapus'
                ]);
            } 
            $kawasan->delete();
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
}
