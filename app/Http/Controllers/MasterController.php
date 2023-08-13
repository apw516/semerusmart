<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function Index()
    {
        $menu = 'MASTER';
        return view('adminmaster.index',compact([
            'menu'
        ]));
    }
    public function pasien()
    {
        $menu = 'PASIEN';
        return view('adminmaster.pasien',compact([
            'menu'
        ]));
    }
    public function pegawai()
    {
        $menu = 'PEGAWAI';
        return view('adminmaster.pegawai',compact([
            'menu'
        ]));
    }
    public function user()
    {
        $menu = 'USER';
        return view('adminmaster.user',compact([
            'menu'
        ]));
    }
    public function diagnosa()
    {
        $menu = 'DIAGNOSA';
        return view('adminmaster.diagnosa',compact([
            'menu'
        ]));
    }
    public function tarif()
    {
        $menu = 'TARIF';
        return view('adminmaster.tarif',compact([
            'menu'
        ]));
    }
}
