<?php

namespace App\Http\Controllers;

use App\Models\Jenis_pohon;
use App\Models\Kawasan;
use App\Models\Pengelola;
use App\Models\Pohon;
use App\Models\Status_kawasan;
use Illuminate\Http\Request;

class PohonController extends Controller
{
    public function index()
    {
        // $data['data_pohons'] = Pohon::with(['jenis_pohon','kawasan','status_kawasan','pengelola'])->paginate();
        $data['data_pohons'] = Pohon::with([
            'jenis_pohon' => function ($query) {
                $query->orderBy('nama');
            },
            'kawasan' => function ($query) {
                $query->orderBy('nama');
            },
            'status_kawasan','pengelola', ])->paginate();
        
        $data['title'] = "Data Pohon";
        return view('master_data.data_pohon.view', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Jenis Pohon";
        $data['jenis_pohons'] = Jenis_pohon::select('id','nama')->get();
        $data['kawasans'] = Kawasan::all();
        $data['status_kawasans'] = Status_kawasan::all();
        $data['pengelolas'] = Pengelola::all();
        return view('master_data.data_pohon.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenis_pohon_id' => 'required',
            'kawasan_id' => 'required',
            'status_kawasan_id' => 'required',
            'umur_pohon' => 'required|integer',
            'pengelola_id' => 'required',
            'koordinat' => 'required',
        ]);
        
        $pohon = Pohon::latest()->first();
        $kode_pohon = "A1-B-RTHP-C1-";
        if($pohon == null) {
            $nomor_urut = '00001';
        } else {
            $explode =  explode('-', $pohon->kode_pohon);
            $nomor_urut = intval($explode[4]) + 1;
            $nomor_urut = str_pad($nomor_urut, 5, "0", STR_PAD_LEFT);
        }
        $validate['kode_pohon'] = $kode_pohon.$nomor_urut;
        
        Pohon::create($validate);
        return redirect('/data-pohon')->with('success', "Berhasil menambahkan data pohon");
    }

    public function show(Pohon $data_pohon)
    {
        //
    }

    public function edit(Pohon $data_pohon)
    {
        $data['title'] = "Edit Data Jenis Pohon";
        $data['data_pohon'] = $data_pohon;
        $data['jenis_pohons'] = Jenis_pohon::select('id','nama')->get();
        $data['kawasans'] = Kawasan::all();
        $data['status_kawasans'] = Status_kawasan::all();
        $data['pengelolas'] = Pengelola::all();
        return view('master_data.data_pohon.edit', $data);
    }

    public function update(Request $request, Pohon $data_pohon)
    {
        $validate = $request->validate([
            'jenis_pohon_id' => 'required',
            'kawasan_id' => 'required',
            'status_kawasan_id' => 'required',
            'umur_pohon' => 'required|integer',
            'pengelola_id' => 'required',
            'koordinat' => 'required',
        ],);
        
        $data_pohon->update($validate);
        return redirect('/data-pohon')->with('success', "Berhasil edit data pohon");
    }

    public function destroy(Pohon $data_pohon)
    {
        $data_pohon->delete();
        return redirect()->back()->with('success', "Berhasil hapus data pohon");   
    }
}
