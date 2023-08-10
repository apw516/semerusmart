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
}
