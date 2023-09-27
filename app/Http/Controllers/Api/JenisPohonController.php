<?php

namespace App\Http\Controllers\Api;

use App\Models\Pohon;
use App\Models\Jenis_pohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JenisPohonController extends Controller
{
    public function index()
    {
        try {
            $data = Jenis_pohon::with('kelompok_tanaman')->get();
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
            'nama' => 'required|unique:jenis_pohons',
            'deskripsi' => 'required',
            'kelompok_tanaman_id' => 'required',
            'image' => 'required|image|file|max:2024|mimes:jpg,jpeg,png'
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'invalid',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $kelompok_tanaman = Jenis_pohon::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kelompok_tanaman_id' => $request->kelompok_tanaman_id,
                'image' => $request->file('image')->store('image-jenis-pohon')
            ]);
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $kelompok_tanaman
            ]);
        } catch (\Throwable $th) {
            Storage::delete($request->file('image')->store('image-jenis-pohon'));
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show(Jenis_pohon $jenis_pohon)
    {
        if($jenis_pohon !== null) {
            return response()->json([
                'message' => 'success',
                'data' => $jenis_pohon
            ]);
        } else {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }
    }

    public function update(Request $request, Jenis_pohon $jenis_pohon)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'kelompok_tanaman_id' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png'
        ]);

        if($request->nama != $jenis_pohon->nama) {
            $validator->addRules(['nama' => 'required|unique:jenis_pohons']);
        }

        if($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $jenis_pohon->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kelompok_tanaman_id' => $request->kelompok_tanaman_id,
                'image' => $request->file('image') ? $request->file('image')->store('image-jenis-pohon') : $jenis_pohon->image
            ]);
            
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $jenis_pohon
            ]);
        } catch (\Throwable $th) {
            if($request->file('image')) {
                Storage::delete($request->file('image')->store('image-jenis-pohon'));
            }
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Jenis_pohon $jenis_pohon)
    {
        if(!$jenis_pohon) {
            return response()->json([
                'message' => 'data tidak di temukan'
            ], 404);
        }

        DB::beginTransaction();
        try {
            $relasi = Pohon::select('jenis_pohon_id')->where('jenis_pohon_id', $jenis_pohon->id)->count();
            if($relasi > 0) {
                return response()->json([
                    'message' => 'data telah di pakai di data pohon, tidak bisa di hapus'
                ]);
            }
            Storage::delete($jenis_pohon->image);
            $jenis_pohon->delete();
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $jenis_pohon
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
