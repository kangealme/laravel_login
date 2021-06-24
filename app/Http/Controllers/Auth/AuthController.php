<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function loginHandler(Request $request)
    {
        //proses validasi
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        //ambil dari db
        $user = User::where('username', $request['username'])->first();
        $menu = Menu::where('id_user', $user->id)->get();
        // $subMenu = Submenu::where('id_menu', $menu->id_menu)->get();
        $subMenu = DB::table('submenus')
            ->select('*')
            ->join('menus', 'submenus.id_menu', '=', 'menus.id_menu')
            ->get();
        if ($user) {
            if ($user['username'] == $request['username']) {
                if (Hash::check($request['password'], $user['password'])) {
                    if ($user['is_active']) {
                        if ($user['is_admin']) {
                            session([
                                'username' => $user['username'],
                                'foto' => $user['file'],
                            ]);
                            return view('user.adminHome', compact('user', 'menu', 'subMenu'));
                        } else {
                            session([
                                'username' => $user['username'],
                                'foto' => $user['file'],
                            ]);
                            return view('user.userHome', compact('user'));
                        }
                    } else {
                        return redirect('/')->with('pesan', 'Belum Aktif. ');
                    }
                } else {
                    return redirect('/')->with('pesan', 'Password Salah.');
                }
            }
        } else {
            return redirect('/')->with('pesan', 'Pengguna Tidak ditemukan');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        //Proses validasi
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ])->save();
        return redirect('/')->with('pesan', 'Pendaftaran Berhasil, Minta Aktivasi Admin');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('pesan', 'Anda telah logout');
    }
}
