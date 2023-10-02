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
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min_digits:5|confirmed',
            'alamat' => 'required',
            'no' => 'required|integer|unique:users|min_digits:9',
            'instagram' => 'required',
            'role' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];
        $validate = $request->validate($rules, [
            'email.unique' => 'Kolom email telah di pakai, silahkan ganti.',
            'no.unique' => 'Kolom no. hp telah di pakai, silahkan ganti.',
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('image-users');
        } else {
            $validate['image'] = 'default/foto.jpg';
        }

        User::create($validate);
        return redirect('/user')->with('success', 'Berhasil menambahkan data user');
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
            'email.unique' => 'Kolom email telah di pakai, silahkan ganti.',
            'no.unique' => 'Kolom no. hp telah di pakai, silahkan ganti.',
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

        $user->update($validate);
        return redirect('/user')->with('success', 'Berhasil edit data user');
    }

    public function destroy(User $user)
    {
        if($user->image != 'default/foto.jpg') {
            Storage::delete($user->image);
        }
        $user->delete();
        return redirect()->back()->with('success', "Berhasil hapus data user");
    }
}
