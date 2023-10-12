<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminControllerAdmin extends Controller
{
    public function index()
    {
        $data['title'] = 'Admin';
        $data['admins'] = Admin::paginate();
        return view('admin.pengguna.admin.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Admin";
        return view('admin.pengguna.admin.tambah', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|unique:admins|email:dns',
            'password' => 'required|min_digits:5|confirmed',
            'alamat' => 'required',
            'no' => 'required|integer|unique:admins|min_digits:9',
            'instagram' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];
        $validate = $request->validate($rules, [
            'email.unique' => 'Kolom email telah di pakai, silahkan ganti.',
            'no.unique' => 'Kolom no. hp telah di pakai, silahkan ganti.',
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('image-admins');
        } else {
            $validate['image'] = 'default/foto.jpg';
        }

        Admin::create($validate);
        return redirect('/admin')->with('success', 'Berhasil menambahkan data admin');
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        $data['title'] = "Edit Admin";
        $data['admin'] = $admin;

        return view('admin.pengguna.admin.edit', $data);
    }

    public function update(Request $request, Admin $admin)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no' => 'required',
            'instagram' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];

        if($request->email != $admin->email) {
            $rules['email'] = 'required|unique:admins|min:5|email:dns';
        }
        
        if($request->no != $admin->no) {
            $rules['no'] = 'required|integer|unique:admins|min_digits:9';
        }

        if($request->password) {
            $rules['password'] = 'min:5|confirmed';
        }

        $validate = $request->validate($rules, [
            'email.unique' => 'Kolom email telah di pakai, silahkan ganti.',
            'no.unique' => 'Kolom no. hp telah di pakai, silahkan ganti.',
        ]);

        if($request->password) {
            $validate['password'] = Hash::make($request->password);
        }

        if($request->file('image')) {
            if($admin->image != 'default/foto.jpg') {
                Storage::delete($admin->image);
            }
            $validate['image'] = $request->file('image')->store('image-admins');
        }

        $admin->update($validate);
        return redirect('/admin')->with('success', 'Berhasil edit data admin');
    }

    public function destroy(Admin $admin)
    {
        if($admin->image != 'default/foto.jpg') {
            Storage::delete($admin->image);
        }
        $admin->delete();
        return redirect()->back()->with('success', "Berhasil hapus data admin");
    }

}
