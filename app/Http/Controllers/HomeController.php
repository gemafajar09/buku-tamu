<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['tamu'] = DB::table('bukutamus')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.home',$data);
    }
}
