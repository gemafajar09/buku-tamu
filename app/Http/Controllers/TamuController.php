<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bukutamu;
use Illuminate\Support\Facades\DB;

class TamuController extends Controller
{
    public function index()
    {
        $data['tamu'] = DB::table('bukutamus')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.tamu.index', $data);
    }

    public function add()
    {
        return view('admin.tamu.add');
    }

    // public function save(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nama' => 'required',
    //         'instansi' => 'required',
    //         'tanggal' => 'required',
    //         'waktu' => 'required',
    //         'no_telp' => 'required',
    //         'bertemu' => 'required',
    //         'keperluan' => 'required',
    //         'foto' => 'mimes:jpeg,bmp,png,jpg',
    //         'ttd' => 'mimes:jpeg,bmp,png,jpg',
    //     ]);

    //     // dd($validator);

    //     if ($validator->fails()) {
    //         return redirect()->route('input-tamu')
    //             ->withErrors($validator)
    //             ->withInput();
    //     } else {
    //         $filename = null;
    //         if ($request->foto) {
    //             $file = $request->file('foto');
    //             $filename = $file->getClientOriginalName();
    //             $file->move('assets_admin/foto/', $filename);
    //         }
    //         $filename2 = null;
    //         if ($request->ttd) {
    //             $file2 = $request->file('ttd');
    //             $filename2 = $file2->getClientOriginalName();
    //             $file2->move('assets_admin/ttd/', $filename2);
    //         }

    //         $simpan = Bukutamu::insert([
    //             'nama' => $request->nama,
    //             'instansi' => $request->instansi,
    //             'tanggal' => $request->tanggal,
    //             'waktu' => $request->waktu,
    //             'no_telp' => $request->no_telp,
    //             'bertemu' => $request->bertemu,
    //             'keperluan' => $request->keperluan,
    //             'foto' => $filename,
    //             'ttd' => $filename2,
    //         ]);
    //     }

    //     if ($simpan == TRUE) {
    //         return redirect()->route('tamu')->with('success', 'Data Berhasil Disimpan');
    //     } else {
    //         return redirect()->route('input-tamu')->with('error', 'Data Gagal Disimpan');
    //     }
    // }

    public function edit($id)
    {
        $data['tamu'] = DB::table('bukutamus')->where('id', $id)->first();

        return view('admin.tamu.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'instansi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'no_telp' => 'required',
            'bertemu' => 'required',
            'keperluan' => 'required',
            'foto' => 'mimes:jpeg,bmp,png,jpg',
            'ttd' => 'mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-user')
                ->withErrors($validator)
                ->withInput();
        } else {
            $filename = $request->fotolama;
            if ($request->foto) {
                $filename = time() . $request->file('foto')->getClientOriginalName();
                $request->foto->move(public_path('assets_admin/foto/'), $filename);

                if ($request->fotolama != 'foto.png') {
                    unlink(public_path('assets_admin/foto/' . $request->fotolama));
                }
            }
            $filename2 = $request->fotolama2;
            if ($request->ttd) {
                $filename2 = time() . $request->file('ttd')->getClientOriginalName();
                $request->ttd->move(public_path('assets_admin/ttd/'), $filename2);

                if ($request->fotolama2 != 'foto.png') {
                    unlink(public_path('assets_admin/ttd/' . $request->fotolama2));
                }
            }
        }

        $simpan = Bukutamu::where('id', $id)->update([
            'nama' => $request->nama,
            'instansi' => $request->instansi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'no_telp' => $request->no_telp,
            'bertemu' => $request->bertemu,
            'keperluan' => $request->keperluan,
            'foto' => $filename,
            'ttd' => $filename2,
        ]);

        if ($simpan == TRUE) {
            return redirect()->route('tamu')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('edit-tamu', $id)->with('error', 'Data Gagal Diubah');
        }
    }

    public function delete($id)
    {
        $deleted = DB::table('bukutamus')->where('id', $id)->delete();

        if ($deleted == TRUE) {
            return redirect()->route('tamu')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('tamu')->with('error', 'Data Gagal Dihapus');
        }
    }
}
