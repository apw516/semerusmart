<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function Index()
    {
        $menu = 'ERM - Pasien';
        return view('Pelayanan.index',compact([
            'menu'
        ]));
    }
}
