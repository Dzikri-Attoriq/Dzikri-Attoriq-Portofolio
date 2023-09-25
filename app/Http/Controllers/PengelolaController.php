<?php

namespace App\Http\Controllers;

use App\Models\Pohon;
use App\Models\Pengelola;
use Illuminate\Http\Request;

class PengelolaController extends Controller
{
    public function index()
    {
        $data['data_pengelolas'] = Pengelola::orderBy('nama')->paginate();
        $data['title'] = "Data Pegnelola";
        return view('master_data.data_pengelola.view', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Pengelola";
        return view('master_data.data_pengelola.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:pengelolas',
        ], [
            'nama.required' => 'Nama Pengelola Wajib Di Isi.',
            'nama.unique' => 'Nama Pengelola Telah di-tambahkan, Silahkan Ganti.',
        ]);
        Pengelola::create($validate);
        return redirect('/data-pengelola')->with('success', "Berhasil menambahkan Data Pengelola ");
    }

    public function show(Pengelola $data_pengelola)
    {
        // 
    }

    public function edit(Pengelola $data_pengelola)
    {
        $data['title'] = "Edit Data Pengelola";
        $data['data_pengelola'] = $data_pengelola;
        return view('master_data.data_pengelola.edit', $data);
    }

    public function update(Request $request, Pengelola $data_pengelola)
    {
        $rules = [];
        if($request->nama != $data_pengelola->nama) {
            $rules['nama'] = 'required|unique:pengelolas';
        } else {
            $rules['nama'] = 'required';
        }
        $validate = $request->validate($rules, [
            'nama.required' => 'Nama Pengelola Wajib Di Isi.',
            'nama.unique' => 'Nama Pengelola Telah di-tambahkan, Silahkan Ganti.',
        ]);
        Pengelola::where('nama', $data_pengelola->nama)->update($validate);
        return redirect('/data-pengelola')->with('success', "Berhasil edit Data Pengelola");
    }

    public function destroy(Pengelola $data_pengelola)
    {
        $relasi = Pohon::select('pengelola_id')->where('pengelola_id', $data_pengelola->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di Data Pohon, Tidak bisa di-Hapus!");
        } else {
            Pengelola::findOrFail($data_pengelola->id)->delete();
            return redirect()->back()->with('success', "Berhasil hapus Data Pengelola");
        }
    }
}