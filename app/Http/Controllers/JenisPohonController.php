<?php

namespace App\Http\Controllers;

use App\Models\Pohon;
use App\Models\Jenis_pohon;
use Illuminate\Http\Request;
use App\Models\Kelompok_tanaman;
use Illuminate\Support\Facades\Storage;

class JenisPohonController extends Controller
{
    public function index()
    {
        $data['jenis_pohons'] = Jenis_pohon::with('kelompok_tanaman')->paginate();
        $data['title'] = "Data Jenis";
        return view('master_data.data_jenis.view', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Jenis Pohon";
        $data['kelompok_tanamans'] = Kelompok_tanaman::all();
        return view('master_data.data_jenis.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:jenis_pohons',
            'deskripsi' => 'required',
            'kelompok_tanaman_id' => 'required',
            'image' => 'required|image|file|max:2048|mimes:jpg,jpeg,png',
        ], [
            'nama.unique' => 'Kolom nama telah di pakai, silahkan ganti.',
        ]);

        $validate['image'] = $request->file('image')->store('image-jenis-pohon');

        Jenis_pohon::create($validate);
        return redirect('/data-jenis')->with('success', "Berhasil menambahkan data jenis pohon");
    }

    public function show(Jenis_pohon $data_jeni)
    {
        //
    }

    public function edit(Jenis_pohon $data_jeni)
    {
        $data['title'] = "Edit Data Jenis Pohon";
        $data['kelompok_tanamans'] = Kelompok_tanaman::all();
        $data['data_jenis'] = $data_jeni;
        return view('master_data.data_jenis.edit', $data);
    }

    public function update(Request $request, Jenis_pohon $data_jeni)
    {
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'kelompok_tanaman_id' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];
        if($request->nama != $data_jeni->nama)
        {
            $rules['nama'] = 'required|unique:jenis_pohons';
        } 

        $validate = $request->validate($rules, [
            'nama.unique' => 'Kolom nama telah di pakai, silahkan ganti.',
        ]);

        if($request->file('image')) {
            Storage::delete($data_jeni->image);
            $validate['image'] = $request->file('image')->store('image-jenis-pohon');
        }
        $data_jeni->update($validate);
        return redirect('/data-jenis')->with('success', "Berhasil edit data jenis pohon");
    }

    public function destroy(Jenis_pohon $data_jeni)
    {
        $relasi = Pohon::select('jenis_pohon_id')->where('jenis_pohon_id', $data_jeni->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di data pohon, tidak bisa di-hapus!");
        } else {
            Storage::delete($data_jeni->image);
            $data_jeni->delete();
            return redirect()->back()->with('success', "Berhasil hapus data jenis pohon");
        }
    }
}
