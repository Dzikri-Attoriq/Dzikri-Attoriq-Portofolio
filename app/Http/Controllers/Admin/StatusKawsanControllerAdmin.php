<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pohon;
use Illuminate\Http\Request;
use App\Models\Status_kawasan;
use App\Http\Controllers\Controller;

class StatusKawsanControllerAdmin extends Controller
{
    public function index()
    {
        $data['status_kawasans'] = Status_kawasan::orderBy('nama')->paginate();
        $data['title'] = "Status Kawasan";
        return view('admin.master_data.status_kawasan.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Status Kawasan";
        return view('admin.master_data.status_kawasan.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:status_kawasans',
        ], [
            'nama.required' => 'Kolom status kawasan wajib di isi.',
            'nama.unique' => 'Kolom status kawasan telah di pakai, silahkan ganti.',
        ]);
        Status_kawasan::create($validate);
        return redirect('/status-kawasan')->with('success', "Berhasil menambahkan status kawasan ");
    }

    public function show(Status_kawasan $status_kawasan)
    {
        //
    }

    public function edit(Status_kawasan $status_kawasan)
    {
        $data['title'] = "Edit Status Kawasan";
        $data['status_kawasan'] = $status_kawasan;
        return view('admin.master_data.status_kawasan.edit', $data);
    }

    public function update(Request $request, Status_kawasan $status_kawasan)
    {
        $rules = ['nama' => 'required'];
        if($request->nama != $status_kawasan->nama) {
            $rules['nama'] = 'required|unique:status_kawasans';
        } 
        $validate = $request->validate($rules, [
            'nama.required' => 'Kolom status kawasan wajib di isi.',
            'nama.unique' => 'Kolom status kawasan telah di pakai, silahkan ganti.',
        ]);
        $status_kawasan->update($validate);
        return redirect('/status-kawasan')->with('success', "Berhasil edit status kawasan");
    }

    public function destroy(Status_kawasan $status_kawasan)
    {
        $relasi = Pohon::select('status_kawasan_id')->where('status_kawasan_id', $status_kawasan->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di data pohon, tidak bisa di-hapus!");
        } else {
            $status_kawasan->delete();
            return redirect()->back()->with('success', "Berhasil hapus status kawasan");
        }
    }
}
