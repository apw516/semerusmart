<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekamedisController extends Controller
{
    public function Index(){
        $menu = 'Pendaftaran';
        return view('Pendaftaran.index',compact([
            'menu'
        ]));
    }
}
