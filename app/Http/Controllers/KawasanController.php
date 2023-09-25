<?php

namespace App\Http\Controllers;

use App\Models\Pohon;
use App\Models\Kawasan;
use Illuminate\Http\Request;

class KawasanController extends Controller
{
    public function index()
    {
        $data['data_kawasans'] = Kawasan::orderBy('nama')->paginate();
        $data['title'] = "Data Kawasan";
        return view('master_data.data_kawasan.view', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Kawasan";
        return view('master_data.data_kawasan.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:kawasans',
        ], [
            'nama.required' => 'Nama Kawasan Wajib Di Isi.',
            'nama.unique' => 'Nama Kawasan Telah di-tambahkan, Silahkan Ganti.',
        ]);
        Kawasan::create($validate);
        return redirect('/data-kawasan')->with('success', "Berhasil menambahkan Data Kawasan ");
    }

    public function show(Kawasan $data_kawasan)
    {
        //
    }

    public function edit(Kawasan $data_kawasan)
    {
        $data['title'] = "Edit Data Kawasan";
        $data['data_kawasan'] = $data_kawasan;
        return view('master_data.data_kawasan.edit', $data);
    }

    public function update(Request $request, Kawasan $data_kawasan)
    {
        $rules = [];
        if($request->nama != $data_kawasan->nama) {
            $rules['nama'] = 'required|unique:kawasans';
        } else {
            $rules['nama'] = 'required';
        }
        $validate = $request->validate($rules, [
            'nama.required' => 'Nama Kawasan Wajib Di Isi.',
            'nama.unique' => 'Nama Kawasan Telah di-tambahkan, Silahkan Ganti.',
        ]);
        Kawasan::where('nama', $data_kawasan->nama)->update($validate);
        return redirect('/data-kawasan')->with('success', "Berhasil edit Data Kawasan");
    }

    public function destroy(Kawasan $data_kawasan)
    {
        $relasi = Pohon::select('kawasan_id')->where('kawasan_id', $data_kawasan->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di Data Pohon, Tidak bisa di-Hapus!");
        } else {
            Kawasan::findOrFail($data_kawasan->id)->delete();
            return redirect()->back()->with('success', "Berhasil hapus Data Kawasan");
        }
    }
}
