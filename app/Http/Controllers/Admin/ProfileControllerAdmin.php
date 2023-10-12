<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileControllerAdmin extends Controller
{
    public function index()
    {
        $data['title'] = "Profile";
        return view('admin.profile.index', $data);
    }

    public function profile_admin()
    {
        $data['title'] = "Edit Profile";
        return view('admin.profile.edit', $data);
    }

    public function update_profile(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no' => 'required',
            'instagram' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];

        if($request->email != Auth::user()->email) {
            $rules['email'] = 'required|unique:admins|min:5|email:dns';
        }
        
        if($request->no != Auth::user()->no) {
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
            if(Auth::user()->image != 'default/foto.jpg') {
                Storage::delete(Auth::user()->image);
            }
            $validate['image'] = $request->file('image')->store('image-admins');
        }

        Admin::findOrFail(Auth::user()->id)->update($validate);
        return redirect('/profile-admin')->with('success', 'Berhasil edit profile');
    }
}
