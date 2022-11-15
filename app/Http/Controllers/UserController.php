<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = DB::table('users')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.user.index', $data);
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('input-user')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('user')->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('input-user')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit($id)
    {
        $data['user'] = DB::table('users')->where('id', $id)->first();

        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-user')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('user')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('edit-user', $id)->with('error', 'Data Gagal Diubah');
        }
    }

    public function delete($id)
    {
        $deleted = DB::table('users')->where('id', $id)->delete();

        if ($deleted == TRUE) {
            return redirect()->route('user')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('user')->with('error', 'Data Gagal Dihapus');
        }
    }
}
