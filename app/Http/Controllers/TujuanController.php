<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tujuan;
use Illuminate\Support\Facades\DB;

class TujuanController extends Controller
{
    public function index()
    {
        $data['tujuan'] = DB::table('tujuans')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.tujuan.index', $data);
    }

    public function add()
    {
        return view('admin.tujuan.add');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tujuan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('input-tujuan')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = tujuan::insert([
            'tujuan' => $request->tujuan,
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('tujuan')->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('input-tujuan')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit($id)
    {
        $data['tujuan'] = DB::table('tujuans')->where('id', $id)->first();

        return view('admin.tujuan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tujuan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-tujuan')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = tujuan::where('id', $id)->update([
            'tujuan' => $request->tujuan,
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('tujuan')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('edit-tujuan', $id)->with('error', 'Data Gagal Diubah');
        }
    }

    public function delete($id)
    {
        $deleted = DB::table('tujuans')->where('id', $id)->delete();

        if ($deleted == TRUE) {
            return redirect()->route('tujuan')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('tujuan')->with('error', 'Data Gagal Dihapus');
        }
    }
}
