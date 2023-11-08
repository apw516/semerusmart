<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.index');
    }
    public function index_register()
    {
        $prof = db::select('select * from mt_profile');
        return view('Auth.index_register',compact([
            'prof'
        ]));
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        $authenticate = [
            'email' => $request->email,
            'password' => $request->password,
            'is_activated' => 1,
        ];
        if(Auth::attempt($authenticate)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('loginError','Login Gagal !');
    }
    public function Gantipassword(Request $request)
    {
        $validateData = $request->validate([
            'passwordlama' => 'required'
        ],[
            'passwordlama.required' => "Password lama wajib diisi !",
        ]);

        $authenticate = [
            'email' => auth()->user()->email,
            'password' => $request->passwordlama
        ];
        if(Auth::attempt($authenticate)){
            $validateData = $request->validate([
                'passwordbaru1' => 'required|min:5|max:255|same:passwordbaru2'
            ],[
                'passwordbaru1.same' => "Password baru tidak sesuai"
            ]);
            $id = auth()->user()->id;
            $password = Hash::make($request->passwordbaru1);
            $data_header_update = [
                'password' => $password
            ];
            User::where('id', $id)->update($data_header_update);
            return redirect('logout');
        }else{
            return back()->with('loginError','Ganti Password Gagal, password lama salah !');
        }
    }
    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:mt_user,username',
            'fullname' => 'required|max:255',
            'nomorponsel' => 'required|numeric|min:10',
            'email' => 'required|email:dns|unique:mt_user,email',
            'password1' => 'required|min:5|max:255|same:password2',
            'namaperusahaan' => 'required'
        ],[
            'fullname.required' => "Nama wajib diisi",
            'nomorponsel.required' => 'Nomor Ponsel wajib diisi',
            'nomorponsel.min:10' => 'Nomor Ponsel tidak valid',
            'nomorponsel.numeric' => 'Nomor Ponsel tidak valid',
            'email.required' => "Email wajib diisi",
            'email.email' => "Email Tidak Valid",
            'username.unique' => "Username Sudah Terdaftar",
            'email.unique' => "Email Sudah Terdaftar",
            'password1.required' => "Password wajib diisi",
            'password1.same' => "Password tidak sama",
            'namaperusahaan.required' => "Nama perusahaan wajib diisi",
        ]);
        $password = Hash::make($request->password1);
        $data = [
            'username' => $request->username,
            'nama' => $request->fullname,
            'nomor_ponsel' => $request->nomorponsel,
            'email' => $request->email,
            'password' => $password,
            'id_profile' => $request->namaperusahaan
        ];
        User::create($data);

        return redirect('/')->with('success','Registrasi Berhasil, Silahkan Cek Email Anda Untuk Melihat Proses Aktivasi !');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function profilindex()
    {
        $menu = 'Profil';
        return view('dashboard.profil',compact('menu'));
    }
}
