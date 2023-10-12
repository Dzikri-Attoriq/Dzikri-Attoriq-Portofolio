<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserControllerUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function update_profile(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'alamat' => 'required',
            'instagram' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ], [
            'email.unique' => 'Kolom email telah di pakai, silahkan ganti.',
            'no.unique' => 'Kolom no. hp telah di pakai, silahkan ganti.',
        ]);

        // if($request->nama != $user->nama) {
        //     $validator->addRules(['nama' => 'required']);
        // }
        if($request->email != $user->email) {
            $validator->addRules(['email' => 'required|unique:users|min:5|email:dns']);
        }
        if($request->no != $user->no) {
            $validator->addRules(['no' => 'required|integer|unique:users|min_digits:9']);
        }

        // if($request->password) {
        //     $rules['password'] = 'min:5|confirmed';
        // }

        // $validate = $request->validate($rules, [
        //     'email.unique' => 'Kolom email telah di pakai, silahkan ganti.',
        //     'no.unique' => 'Kolom no. hp telah di pakai, silahkan ganti.',
        // ]);

        // if($request->password) {
        //     $validate['password'] = Hash::make($request->password);
        // }

        // if($request->file('image')) {
        //     if($user->image != 'default/foto.jpg') {
        //         Storage::delete($user->image);
        //     }
        //     $validate['image'] = $request->file('image')->store('image-users');
        // }

        $user->update([
            'instagram' => $request->instagram
        ]);
        return redirect()->back()->with('success', 'Berhasil edit profile');
    }
}
