<?php

namespace App\Http\Controllers;

use App\Models\Pohon;
use Illuminate\Http\Request;
use App\Models\Status_kawasan;

class StatusKawsanController extends Controller
{
    public function index()
    {
        $data['status_kawasans'] = Status_kawasan::orderBy('nama')->paginate();
        $data['title'] = "Status Kawasan";
        return view('master_data.status_kawasan.view', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Status Kawasan";
        return view('master_data.status_kawasan.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:status_kawasans',
        ], [
            'nama.required' => 'Status Kawasan Wajib Di Isi.',
            'nama.unique' => 'Status Kawasan Telah di-tambahkan, Silahkan Ganti.',
        ]);
        Status_kawasan::create($validate);
        return redirect('/status-kawasan')->with('success', "Berhasil menambahkan Data Kawasan ");
    }

    public function show(Status_kawasan $status_kawasan)
    {
        //
    }

    public function edit(Status_kawasan $status_kawasan)
    {
        $data['title'] = "Edit Status Kawasan";
        $data['status_kawasan'] = $status_kawasan;
        return view('master_data.status_kawasan.edit', $data);
    }

    public function update(Request $request, Status_kawasan $status_kawasan)
    {
        $rules = [];
        if($request->nama != $status_kawasan->nama) {
            $rules['nama'] = 'required|unique:status_kawasans';
        } else {
            $rules['nama'] = 'required';
        }
        $validate = $request->validate($rules, [
            'nama.required' => 'Status Kawasan Wajib Di Isi.',
            'nama.unique' => 'Status Kawasan Telah di-tambahkan, Silahkan Ganti.',
        ]);
        Status_kawasan::where('nama', $status_kawasan->nama)->update($validate);
        return redirect('/status-kawasan')->with('success', "Berhasil edit Status Kawasan");
    }

    public function destroy(Status_kawasan $status_kawasan)
    {
        $relasi = Pohon::select('status_kawasan_id')->where('status_kawasan_id', $status_kawasan->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di Data Pohon, Tidak bisa di-Hapus!");
        } else {
            Status_kawasan::findOrFail($status_kawasan->id)->delete();
            return redirect()->back()->with('success', "Berhasil hapus Status Kawasan");
        }
    }
}
