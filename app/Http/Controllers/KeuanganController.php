<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index(){
        $menu = 'KASIR';

        return view('keuangan.index',[
            'menu' => $menu
        ]);
    }
}
