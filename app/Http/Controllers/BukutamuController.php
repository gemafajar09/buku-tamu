<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BukutamuController extends Controller
{
    public function index()
    {
        return view('registertamu.index');
    }

    public function pemanggilan()
    {
        return view('pemanggilan.index');
    }

    public function simpan(Request $r)
    {
        $folderPath = "userfoto/";

        $fotoUser = explode(";base64,", $r->foto);
        $typeFormat = explode("image/", $fotoUser[0]);
        $image_type = $typeFormat[1];
        $fotoBaseUser = base64_decode($fotoUser[1]);
        $fileUser = "userfoto/" . uniqid() . '.'.$image_type;
        file_put_contents($fileUser, $fotoBaseUser);

        $fotoTtd = explode(";base64,", $r->tandatangan);
        $typeFormat1 = explode("image/", $fotoTtd[0]);
        $image_type1 = $typeFormat1[1];
        $fotoBaseTtd = base64_decode($fotoTtd[1]);
        $fileTtd = "ttdfoto/" . uniqid() . '.'.$image_type1;
        file_put_contents($fileTtd, $fotoBaseTtd);

        $data['nama'] = $r->nama_lengkap;
        $data['instansi'] = $r->instansi;
        $data['tanggal'] = $r->tanggal;
        $data['waktu'] = $r->waktu;
        $data['no_telp'] = $r->notelp;
        $data['bertemu'] = $r->bertemu;
        $data['keperluan'] = "";
        $data['foto'] = $fileUser;
        $data['ttd'] = $fileTtd;

        $simpan = DB::table("bukutamus")->insert($data);

        return response()->json($simpan);
    }
}
