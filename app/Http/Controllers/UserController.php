<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data['title'] = 'Users';
        $data['users'] = User::paginate();
        return view('settings.user.view', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Users";
        return view('settings.user.tambah', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|unique:users|min:5|email:dns',
            'password' => 'required|min:5|confirmed',
            'alamat' => 'required',
            'no' => 'required|integer|unique:users|min_digits:9',
            'instagram' => 'required',
            'role' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];

        $validate = $request->validate($rules, [
            'nama.required' => 'Nama Wajib Di Isi.',
            'email.required' => 'Email Wajib Di Isi.',
            'password.required' => 'Password Wajib Di Isi.',
            'alamat.required' => 'Alamat Wajib Di Isi.',
            'no.required' => 'No. Hp Wajib Di Isi.',
            'instagram.required' => 'Instagram Wajib Di Isi.',
            'role.required' => 'Role Wajib Di Isi.',
            'image.required' => 'Foto Wajib Di Isi.',
            'email.min' => 'Email Minimal terdiri dari 5 karakter.',
            'email.unique' => 'Email Telah di Pakai, Silahkan Ganti.',
            'email.email' => 'Email harus merupakan email yang valid.',
            'password.min' => 'Password Minimal terdiri dari 5 karakter.',
            'password.confirmed' => 'Password dan Konfirmasi Password Tidak Sama.',
            'no.unique' => 'No. Hp Telah di Pakai, Silahkan Ganti.',
            'no.integer' => 'No. Hp Harus Berupa Angka (0-9).',
            'no.min_digits' => 'No. Hp Minimal Mempunyai 9 Digit.',
            'image.max' => 'Foto maksimal berukuran 2 mb.',
            'image.mimes' => 'Foto harus bertipe jpg/jpeg/png.',
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('image-users');
        } else {
            $validate['image'] = 'default/foto.jpg';
        }

        User::create($validate);
        return redirect('/user')->with('success', 'Berhasil menambahkan Data User');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $data['title'] = "Edit User";
        $data['user'] = $user;

        return view('settings.user.edit', $data);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no' => 'required',
            'instagram' => 'required',
            'role' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];

        if($request->email != $user->email) {
            $rules['email'] = 'required|unique:users|min:5|email:dns';
        }
        
        if($request->no != $user->no) {
            $rules['no'] = 'required|integer|unique:users|min_digits:9';
        }

        if($request->password) {
            $rules['password'] = 'min:5|confirmed';
        }

        $validate = $request->validate($rules, [
            'nama.required' => 'Nama Wajib Di Isi.',
            'email.required' => 'Email Wajib Di Isi.',
            'alamat.required' => 'Alamat Wajib Di Isi.',
            'no.required' => 'No. Hp Wajib Di Isi.',
            'instagram.required' => 'Instagram Wajib Di Isi.',
            'role.required' => 'Role Wajib Di Isi.',
            'email.min' => 'Email Minimal terdiri dari 5 karakter.',
            'email.unique' => 'Email Telah di Pakai, Silahkan Ganti.',
            'email.email' => 'Email harus merupakan email yang valid.',
            'password.min' => 'Password Minimal terdiri dari 5 karakter.',
            'password.confirmed' => 'Password dan Konfirmasi Password Tidak Sama.',
            'no.unique' => 'No. Hp Telah di Pakai, Silahkan Ganti.',
            'no.integer' => 'No. Hp Harus Berupa Angka (0-9).',
            'no.min_digits' => 'No. Hp Minimal Mempunyai 9 Digit.',
            'image.max' => 'Foto maksimal berukuran 2 mb.',
            'image.mimes' => 'Foto harus bertipe jpg/jpeg/pdf.',
        ]);

        if($request->password) {
            $validate['password'] = Hash::make($request->password);
        }

        if($request->file('image')) {
            if($user->image != 'default/foto.jpg') {
                Storage::delete($user->image);
            }
            $validate['image'] = $request->file('image')->store('image-users');
        }

        User::where('email', $user->email)->update($validate);
        return redirect('/user')->with('success', 'Berhasil Edit Data User');
    }

    public function destroy(User $user)
    {
        if($user->image != 'default/foto.jpg') {
            Storage::delete($user->image);
        }
        User::findOrFail($user->id)->delete();
        return redirect()->back()->with('success', "Berhasil hapus Data User");
    }
}
