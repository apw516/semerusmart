<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index()
    {
        $menu = 'Dashboard';
        return view('dashboard.index',compact([
            'menu'
        ]));
    }
}
