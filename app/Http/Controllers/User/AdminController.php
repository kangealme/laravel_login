<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function listUser()
    {
        //ambil semua data user
        $users = User::all();
        return view('user.listUserAdmin', compact('users'));
    }

    public function editUser(Request $request, $id)
    {
        //Cari user yang akan diedit
        $user = User::find($id);

        //cek apakah sesi masih ada
        if (!$request->session()->has('username')) {
            return redirect('/')->with('pesan', 'Sesi Telah Berakhir');
        } else {
            return view('user.userEditAdmin', compact('user'));
        }
    }

    public function delUser($id)
    {
        //delete user sesuuai id
        User::destroy($id);
        return redirect('/listUserAdmin')->with('pesan', 'Berhasil Hapus User');
    }
}
