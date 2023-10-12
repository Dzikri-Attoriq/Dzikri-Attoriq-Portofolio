<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jenis_pohon;
use App\Models\Pengelola;
use App\Models\Status_kawasan;
use Illuminate\Http\Request;
use App\Models\Jadwal_kegiatan;
use App\Http\Controllers\Controller;

class JadwalKegiatanControllerAdmin extends Controller
{
    public function index()
    {
        $data['jadwal_kegiatans'] = Jadwal_kegiatan::with(['jenis_pohon','status_kawasan','pengelola'])->paginate();
        
        $data['title'] = "Jadwal Kegiatan";
        return view('admin.jadwal_kegiatan.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Jadwal Kegiatan";
        $data['jenis_pohons'] = Jenis_pohon::select('id','nama')->get();
        $data['status_kawasans'] = Status_kawasan::all();
        $data['pengelolas'] = Pengelola::all();
        return view('admin.jadwal_kegiatan.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenis_pohon_id' => 'required',
            'judul' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
            'status_kawasan_id' => 'required',
            'pengelola_id' => 'required',
            'koordinat' => 'required',
        ]);
        $validate['tanggal'] = substr($request->tanggal, 0, 10);

        Jadwal_kegiatan::create($validate);
        return redirect('/jadwal-kegiatan')->with('success', "Berhasil menambahkan jadwal kegiatan");
    }

    public function show(Jadwal_kegiatan $jadwal_kegiatan)
    {
        //
    }

    public function edit(Jadwal_kegiatan $jadwal_kegiatan)
    {
        $data['title'] = "Edit Jadwal Kegiatan";
        $data['jadwal_kegiatan'] = $jadwal_kegiatan;
        $data['jenis_pohons'] = Jenis_pohon::select('id','nama')->get();
        $data['status_kawasans'] = Status_kawasan::all();
        $data['pengelolas'] = Pengelola::all();
        return view('admin.jadwal_kegiatan.edit', $data);
    }

    public function update(Request $request, Jadwal_kegiatan $jadwal_kegiatan)
    {
        $validate = $request->validate([
            'jenis_pohon_id' => 'required',
            'judul' => 'required',
            'alamat' => 'required',
            'status_kawasan_id' => 'required',
            'pengelola_id' => 'required',
            'koordinat' => 'required',
        ]);
        $validate['tanggal'] = substr($request->tanggal, 0, 10);
        
        $jadwal_kegiatan->update($validate);
        return redirect('/jadwal-kegiatan')->with('success', "Berhasil edit jadwal kegiatan");
    }

    public function destroy(Jadwal_kegiatan $jadwal_kegiatan)
    {
        $jadwal_kegiatan->delete();
        return redirect()->back()->with('success', "Berhasil hapus jadwal kegiatan");   
    }
}
