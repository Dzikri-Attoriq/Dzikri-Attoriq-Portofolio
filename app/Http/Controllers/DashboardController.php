<?php

namespace App\Http\Controllers;

use App\Models\Jenis_pohon;
use App\Models\Kawasan;
use App\Models\Pohon;
use App\Models\Status_kawasan;
use App\Models\Pengelola;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['pohons'] = Pohon::with('jenis_pohon')->get();
        return view('dashboard/dashboard', $data);
    }

    public function user_dashboard()
    {
        $data['title'] = "User Dashboard";
        $data['jenis_pohons'] = Jenis_pohon::select('id','nama')->get();
        $data['kawasans'] = Kawasan::all();
        $data['status_kawasans'] = Status_kawasan::all();
        $data['pengelolas'] = Pengelola::all();
        return view('dashboard/user_dashboard', $data);
    }

    public function scan()
    {
        $data['title'] = "Scan";
        return view('scan/scan', $data);
    }

    public function validasi()
    {
        return response()->json([
            'status' => 200
        ]);
    }

}
