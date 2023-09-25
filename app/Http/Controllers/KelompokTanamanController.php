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
            'nama.required' => 'Kelompok Tanaman Wajib Di Isi.',
            'nama.unique' => 'Kelompok Tanaman Telah di-tambahkan, Silahkan Ganti.',
        ]);
        Kelompok_tanaman::create($validate);
        return redirect('/kelompok-tanaman')->with('success', "Berhasil menambahkan Data Kelompok Tanaman ");
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
        $rules = [];
        if($request->nama != $kelompok_tanaman->nama) {
            $rules['nama'] = 'required|unique:kelompok_tanamans';
        } else {
            $rules['nama'] = 'required';
        }
        $validate = $request->validate($rules, [
            'nama.required' => 'Kelompok Tanaman Wajib Di Isi.',
            'nama.unique' => 'Kelompok Tanaman Telah di-tambahkan, Silahkan Ganti.',
        ]);
        Kelompok_tanaman::where('nama', $kelompok_tanaman->nama)->update($validate);
        return redirect('/kelompok-tanaman')->with('success', "Berhasil edit Data Kelompok Tanaman");
    }

    public function destroy(Kelompok_tanaman $kelompok_tanaman)
    {
        $relasi = Jenis_pohon::select('kelompok_tanaman_id')->where('kelompok_tanaman_id', $kelompok_tanaman->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di Data Jenis Pohon, Tidak bisa di-Hapus!");
        } else {
            Kelompok_tanaman::findOrFail($kelompok_tanaman->id)->delete();
            return redirect()->back()->with('success', "Berhasil hapus Data Kelompok Tanaman");
        }
    }
}
