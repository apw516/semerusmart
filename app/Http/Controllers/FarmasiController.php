<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmasiController extends Controller
{
    public function index()
    {
        $menu = 'Layanan Resep';
        return view('farmasi.index',compact([
            'menu'
        ]));
    }
    public function masterobat()
    {
        $menu = 'Master Obat';
        return view('farmasi.masterobat',compact([
            'menu'
        ]));
    }
    public function stokobat()
    {
        $menu = 'Stok Obat';
        return view('farmasi.stokobat',compact([
            'menu'
        ]));
    }
    public function riwayatresep()
    {
        $menu = 'Riwayat Resep';
        return view('farmasi.riwayatresep',compact([
            'menu'
        ]));
    }
}
