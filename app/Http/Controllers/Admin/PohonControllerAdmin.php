<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jenis_pohon;
use App\Models\Kawasan;
use App\Models\Pengelola;
use App\Models\Pohon;
use App\Models\Status_kawasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PohonControllerAdmin extends Controller
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
        return view('admin.master_data.data_pohon.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Jenis Pohon";
        $data['jenis_pohons'] = Jenis_pohon::select('id','nama')->get();
        $data['kawasans'] = Kawasan::all();
        $data['status_kawasans'] = Status_kawasan::all();
        $data['pengelolas'] = Pengelola::all();
        return view('admin.master_data.data_pohon.tambah', $data);
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
        return view('admin.master_data.data_pohon.edit', $data);
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
