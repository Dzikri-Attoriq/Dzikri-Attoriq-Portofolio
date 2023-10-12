<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pohon;
use App\Models\Kawasan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KawasanControllerAdmin extends Controller
{
    public function index()
    {
        $data['data_kawasans'] = Kawasan::orderBy('nama')->paginate();
        $data['title'] = "Data Kawasan";
        return view('admin.master_data.data_kawasan.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Kawasan";
        return view('admin.master_data.data_kawasan.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:kawasans',
        ], [
            'nama.unique' => 'Kolom nama kawasan telah di pakai, silahkan ganti.',
        ]);
        Kawasan::create($validate);
        return redirect('/data-kawasan')->with('success', "Berhasil menambahkan data kawasan ");
    }

    public function show(Kawasan $data_kawasan)
    {
        //
    }

    public function edit(Kawasan $data_kawasan)
    {
        $data['title'] = "Edit Data Kawasan";
        $data['data_kawasan'] = $data_kawasan;
        return view('admin.master_data.data_kawasan.edit', $data);
    }

    public function update(Request $request, Kawasan $data_kawasan)
    {
        $rules = ['nama' => 'required'];
        if($request->nama != $data_kawasan->nama) {
            $rules['nama'] = 'required|unique:kawasans';
        } 
        $validate = $request->validate($rules, [
            'nama.unique' => 'Kolom nama kawasan telah di pakai, silahkan ganti.',
        ]);
        $data_kawasan->update($validate);
        return redirect('/data-kawasan')->with('success', "Berhasil edit data kawasan");
    }

    public function destroy(Kawasan $data_kawasan)
    {
        $relasi = Pohon::select('kawasan_id')->where('kawasan_id', $data_kawasan->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di data pohon, tidak bisa di-hapus!");
        } else {
            $data_kawasan->delete();
            return redirect()->back()->with('success', "Berhasil hapus Data Kawasan");
        }
    }
}
