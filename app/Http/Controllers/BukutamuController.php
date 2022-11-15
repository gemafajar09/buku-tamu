<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
