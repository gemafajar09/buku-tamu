<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        //cek login
        $valid = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        // dd($valid);

        if ($valid->fails()) {
            return redirect()->route('/')->withErrors($valid)->withInput();
        } else {
            $datauser = DB::table('users')
                ->where('email', $request->email)
                ->first();

            // dd($datauser);
            if ($datauser) {
                if (Hash::check($request->password, $datauser->password)) {
                    //buat session
                    $request->session()->put('id', $datauser->id);
                    $request->session()->put('name', $datauser->name);

                    return redirect()->route('home')->with("success", "Selamat Datang " . Str::upper(session('name')));
                } else {
                    return redirect()->route('/')->with('error', 'Password Anda Salah');
                }
            } else {
                return redirect()->route('/')->with('error', 'Email Anda Tidak Valid');
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('id');
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('password');
        $request->session()->flush();
        // redirect ke halaman login
        return redirect()->route('/')->with("success", "Anda Sudah Logout");
    }
}
