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
            'image' => 'required|image|file|max:2024|mimes:jpg,jpeg,png',
        ], [
            'nama.required' => 'Data Jenis Pohon Wajib Di Isi.',
            'deskripsi.required' => 'Deskripsi Pohon Pohon Wajib Di Isi.',
            'kelompok_tanaman_id.required' => 'Kelompok Tanaman Wajib Di Isi.',
            'image.required' => 'Foto Wajib Di Isi.',
            'image.image' => 'Foto harus berupa gambar.',
            'image.file' => 'Foto Harus berupa file.',
            'image.max' => 'Foto tidak boleh lebih dari 2 mb.',
            'image.mimes' => 'Foto harus berupa jpg/jpeg/png.',
            'nama.unique' => 'Data Jenis Pohon Telah di-tambahkan, Silahkan Ganti.',
        ]);

        $validate['image'] = $request->file('image')->store('image-jenis-pohon');

        Jenis_pohon::create($validate);
        return redirect('/data-jenis')->with('success', "Berhasil menambahkan Data Jenis Pohon");
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
            'deskripsi' => 'required',
            'kelompok_tanaman_id' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];

        if($request->nama != $data_jeni->nama)
        {
            $rules['nama'] = 'required|unique:jenis_pohons';
        } else {
            $rules['nama'] = 'required';
        }

        $validate = $request->validate($rules, [
            'nama.required' => 'Data Jenis Pohon Wajib Di Isi.',
            'deskripsi.required' => 'Deskripsi Pohon Pohon Wajib Di Isi.',
            'kelompok_tanaman_id.required' => 'Kelompok Tanaman Wajib Di Isi.',
            'image.image' => 'Foto harus berupa gambar.',
            'image.file' => 'Foto Harus berupa file.',
            'image.max' => 'Foto tidak boleh lebih dari 2 mb.',
            'image.mimes' => 'Foto harus berupa jpg/jpeg/png.',
            'nama.unique' => 'Data Jenis Pohon Telah di-tambahkan, Silahkan Ganti.',
        ]);

        if($request->file('image')) {
            Storage::delete($data_jeni->image);
            $validate['image'] = $request->file('image')->store('image-jenis-pohon');
        }
        Jenis_pohon::where('nama', $data_jeni->nama)->update($validate);
        return redirect('/data-jenis')->with('success', "Berhasil edit Data Jenis Pohon");
    }

    public function destroy(Jenis_pohon $data_jeni)
    {
        $relasi = Pohon::select('jenis_pohon_id')->where('jenis_pohon_id', $data_jeni->id)->count();
        if($relasi > 0) {
            return redirect()->back()->with('relasi', "Data telah di pakai di Data Pohon, Tidak bisa di-Hapus!");
        } else {
            Storage::delete($data_jeni->image);
            Jenis_pohon::findOrFail($data_jeni->id)->delete();
            return redirect()->back()->with('success', "Berhasil hapus Data Jenis Pohon");
        }
    }
}
