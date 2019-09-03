<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;

class LoginController extends Controller
{
    //
    public function Registrasi()
    {
        return view('Registrasi');
    }

    public function Daftar(Request $request)
    {
        $user = new User();
        $user->username = $request->get('username');
        $user->password = Hash::make($request->get('password'));
        $user->level = "Admin";
        $user->save();

        return redirect('masuk');
    }

    public function HalamanLogin()
    {
        return view('halamanlogin');
    }

    public function Login(Request $request)
    {
        $login = Auth::attempt(['username' => $request->get('username'),
         'password' => $request->get('password')]);
        if($login){
            return redirect('home');
        }else{
            return redirect('/masuk')->with('error', 'Gagal');
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('masuk');
    }
}
