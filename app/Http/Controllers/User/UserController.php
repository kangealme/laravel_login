<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function profilUser(Request $request)
    {
        //ambil dari db
        if (!$request->session()->has('username')) {
            return redirect('/')->with('pesan', 'Anda Harus Login');
        } else {
            $user = User::where('username', $request->session()->get('username'))->first();
            return view('user.userHome', compact('user'));
        }
    }

    public function editUser(Request $request)
    {
        //Ambil dari db
        if (!$request->session()->has('username')) {
            return redirect('/')->with('pesan', 'Sesi Telah Berakhir');
        } else {
            $user = User::where('username', $request->session()->get('username'))->first();
            return view('user.userEdit', compact('user'));
        }
    }
    public function updateUser(Request $request)
    {
        //Ambil dari db
        if (!$request->session()->has('username')) {
            return redirect('/')->with('pesan', 'Sesi Telah Berakhir');
        } else {
            $user = User::where('username', $request->session()->get('username'))->first();
            $namaFile = $user->file; //memasukkan nama file, agar jika tidak diupdate nama tetap

            //uji apakah ada file baru
            if ($request->file) {
                //menyimpan data file yang diupload ke variabel $file
                $file = $request->file('file');
                // $pathUpload = url('/assets/img/pengguna');
                $pathUpload = public_path('/assets/img/pengguna');

                //merubah nafa file agar sesuai dengan nama pengguna
                $namaFile = Carbon::now()->timestamp . Str::slug($request->name) . "." . $file->getClientOriginalExtension();

                //proses upload
                $file->move($pathUpload, $namaFile);
            }

            //proses update
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->nohp = $request->nohp;
            $user->file = $namaFile;

            $user->save();

            //membuat pesan berhasil
            // $this->session()->put('pesan', 'Update Data Berhasil');

            return redirect('/listUser')->with('pesan', 'Data berhasil diupdate');
        }
    }

    public function listUser(Request $request)
    {
        //ambil data para pengguna
        $tmp = $request->session()->get('username');
        $users = User::where('username', $tmp)->get();

        return view('user.listUser', compact('users'));
    }
}
