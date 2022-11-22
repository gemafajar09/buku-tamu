<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PlaylistController extends Controller
{
    public function index()
    {
        $data['play'] = DB::table('playlists')->get();
        return view('admin.playlist.index',$data);
    }

    public function simpan(Request $r)
    {
        $valid = validator::make($r->all(), [
            'audio' =>'nullable|mimes:audio/mpeg,mpga,mp3,wav,aac,oog'
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $filename = $r->audio->getClientOriginalName();
            $original_ext = $r->audio->getClientOriginalExtension();
            $nama = str_replace(".".$original_ext, "",$filename);
            $filepath = $r->audio->move('audio/',$filename);

            $simpan = DB::table('playlists')->insert(['playlist' => $nama]);

            if($simpan){
                return back()->with('success','berhasil');
            }else{
                return back()->with('error','Server Error');
            }
        }


    }

    public function hapus($id)
    {
        $lagu = DB::table('playlists')->where('id',$id)->first();
        $audio = app_path("audio/{$lagu->playlist}");

        if (File::exists($audio)) {
            //File::delete($image_path);
            unlink($audio);
        }
        $hapus = DB::table('playlists')->where('id',$id)->delete();

        if($hapus){
            return back()->with('success','berhasil');
        }else{
            return back()->with('error','Server Error');
        }
    }
}
