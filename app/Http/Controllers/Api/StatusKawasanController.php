<?php

namespace App\Http\Controllers\Api;

use App\Models\Pohon;
use Illuminate\Http\Request;
use App\Models\Status_kawasan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StatusKawasanController extends Controller
{
    public function index()
    {
        try {
            $data = Status_kawasan::all();
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
            'nama' => 'required|unique:status_kawasans'
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'invalid',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $status_kawasan = Status_kawasan::create(['nama' => $request->nama]);
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $status_kawasan
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show(Status_kawasan $status_kawasan)
    {
        if($status_kawasan !== null) {
            return response()->json([
                'message' => 'success',
                'data' => $status_kawasan
            ]);
        } else {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }
    }

    public function update(Request $request, Status_kawasan $status_kawasan)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);
        if($request->nama != $status_kawasan->nama) {
            $validator->addRules(['nama' => 'required|unique:status_kawasans']);
        }
        if($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $status_kawasan->update(['nama' => $request->nama]);
            
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $status_kawasan
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Status_kawasan $status_kawasan)
    {
        if(!$status_kawasan) {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }

        DB::beginTransaction();
        try {
            $relasi = Pohon::select('status_kawasan_id')->where('status_kawasan_id', $status_kawasan->id)->count();
            if($relasi > 0) {
                return response()->json([
                    'message' => 'data telah di pakai di data pohon, tidak bisa di hapus'
                ]);
            } 
            $status_kawasan->delete();
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $status_kawasan
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
