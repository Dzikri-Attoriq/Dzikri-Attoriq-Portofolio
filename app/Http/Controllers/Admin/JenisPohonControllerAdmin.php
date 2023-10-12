<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pohon;
use App\Models\Jenis_pohon;
use Illuminate\Http\Request;
use App\Models\Kelompok_tanaman;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class JenisPohonControllerAdmin extends Controller
{
    public function index()
    {
        $data['jenis_pohons'] = Jenis_pohon::with('kelompok_tanaman')->paginate();
        $data['title'] = "Data Jenis";
        return view('admin.master_data.data_jenis.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Jenis Pohon";
        $data['kelompok_tanamans'] = Kelompok_tanaman::all();
        return view('admin.master_data.data_jenis.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:jenis_pohons',
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'kelompok_tanaman_id' => 'required',
            'status' => 'required',
            'image' => 'required|image|file|max:2048|mimes:jpg,jpeg,png',
        ], [
            'nama.unique' => 'Kolom nama telah di pakai, silahkan ganti.',
        ]);

        $jenis_pohon = Jenis_pohon::latest('id')->first();
        $kode_pohon = "A1-B-RTHP-C1-";
        if($jenis_pohon == null) {
            $nomor_urut = '00001';
        } else {
            $explode =  explode('-', $jenis_pohon->kode_pohon);
            $nomor_urut = intval($explode[4]) + 1;
            $nomor_urut = str_pad($nomor_urut, 5, "0", STR_PAD_LEFT);
        }
        $validate['kode_pohon'] = $kode_pohon.$nomor_urut;
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
        return view('admin.master_data.data_jenis.edit', $data);
    }

    public function update(Request $request, Jenis_pohon $data_jeni)
    {
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'kelompok_tanaman_id' => 'required',
            'status' => 'required',
            'image' => 'image|file|max:2048|mimes:jpg,jpeg,png',
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
