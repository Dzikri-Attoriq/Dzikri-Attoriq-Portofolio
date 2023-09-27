<?php

namespace App\Http\Controllers\Api;

use App\Models\Pohon;
use App\Models\Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengelola $pengelola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengelola $pengelola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
