<?php

namespace App\Http\Controllers;

use App\Models\Jenis_pohon;
use App\Models\Kelompok_tanaman;
use Illuminate\Http\Request;

class KelompokTanamanController extends Controller
{
    public function index()
    {
        $data['kelompok_tanamans'] = Kelompok_tanaman::with('jenis_pohon')->paginate();
        $data['title'] = "Kelompok Tanaman";
        return view('master_data.kelompok_tanaman.view', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Kelompok Tanaman";
        return view('master_data.kelompok_tanaman.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:kelompok_tanamans',
        ], [
            'nama.unique' => 'Kolom nama kelompok telah di pakai, silahkan ganti.',
        ]);
        Kelompok_tanaman::create($validate);
        return redirect('/kelompok-tanaman')->with('success', "Berhasil menambahkan data kelompok tanaman ");
    }

    public function show(Kelompok_tanaman $kelompok_tanaman)
    {
        //
    }

    public function edit(Kelompok_tanaman $kelompok_tanaman)
    {
        $data['title'] = "Edit Kelompok Tanaman";
        $data['kelompok_tanaman'] = $kelompok_tanaman;
        return view('master_data.kelompok_tanaman.edit', $data);
    }

    public function update(Request $request, Kelompok_tanaman $kelompok_tanaman)
    {
        $rules = ['nama' => 'required'];
        if($request->nama != $kelompok_tanaman->nama) {
            $rules['nama'] = 'required|unique:kelompok_tanamans';
        } 
        $validate = $request->validate($rules, [
            'nama.unique' => 'Kolom nama kelompok telah di pakai, silahkan ganti.',
        ]);
        $kelompok_tanaman->update($validate);
        return redirect('/kelompok-tanaman')->with('success', "Berhasil edit data kelompok tanaman");
    }

    public function destroy(Kelompok_tanaman $kelompok_tanaman)
    {
        $relasi = Jenis_pohon::select('kelompok_tanaman_id')->where('kelompok_tanaman_id', $kelompok_tanaman->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di data jenis pohon, tidak bisa di-hapus!");
        } else {
            $kelompok_tanaman->delete();
            return redirect()->back()->with('success', "Berhasil hapus data kelompok tanaman");
        }
    }
}
