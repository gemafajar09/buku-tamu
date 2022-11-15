<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        $data['pegawai'] = DB::table('pegawais')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pegawai.index', $data);
    }

    public function add()
    {
        return view('admin.pegawai.add');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pegawai' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('input-pegawai')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Pegawai::insert([
            'nama_pegawai' => $request->nama_pegawai,
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('pegawai')->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('input-pegawai')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit($id)
    {
        $data['pegawai'] = DB::table('pegawais')->where('id', $id)->first();

        return view('admin.pegawai.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pegawai' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-pegawai')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Pegawai::where('id', $id)->update([
            'nama_pegawai' => $request->nama_pegawai,
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('pegawai')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('edit-pegawai', $id)->with('error', 'Data Gagal Diubah');
        }
    }

    public function delete($id)
    {
        $deleted = DB::table('pegawais')->where('id', $id)->delete();

        if ($deleted == TRUE) {
            return redirect()->route('pegawai')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('pegawai')->with('error', 'Data Gagal Dihapus');
        }
    }
}
