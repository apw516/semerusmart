<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportingController extends Controller
{
    public function Index()
    {
        $menu = 'Pemakaian Obat';
        $now = $this->get_date();
        return view('reporting.index_pemakaian_obat', compact([
            'menu',
            'now'
        ]));
    }
    public function riwayatpemakaian_obat(Request $request)
    {
        $tgl_awal = $request->tglawal;
        $tgl_akhir = $request->tglakhir;
        $data = DB::select("CALL laporan_pemakaian_obat('$tgl_awal','$tgl_akhir')");
        return view('reporting.tabel_pemakaian',compact([
            'data'
        ]));
    }
    public function get_date()
    {
        $dt = Carbon::now()->timezone('Asia/Jakarta');
        $date = $dt->toDateString();
        $now = $date;
        return $now;
    }
}
