<?php

namespace App\Http\Controllers;

use App\Models\mt_paramedis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function Index()
    {
        $menu = 'MASTER';
        return view('adminmaster.index', compact([
            'menu'
        ]));
    }
    public function pasien()
    {
        $menu = 'PASIEN';
        return view('adminmaster.pasien', compact([
            'menu'
        ]));
    }
    public function ambil_master_pasien()
    {
        $pasien = DB::select('select *,fc_alamat(no_rm) as alamat from mt_pasien');
        return view('adminmaster.tabel_pasien', compact([
            'pasien'
        ]));
    }
    public function pegawai()
    {
        $menu = 'PEGAWAI';
        $unit = DB::select('select * from mt_unit');
        return view('adminmaster.pegawai', compact([
            'menu',
            'unit'
        ]));
    }
    public function simpankary(Request $request)
    {
        $data = json_decode($_POST['data'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        $kode_par = $this->get_kode_paramedis();
        $datapar = [
            'kode_paramedis' => $kode_par,
            'nama_paramedis' => $dataSet['namakary'],
            'unit' => $dataSet['unit'],
            'sip_dr' => $dataSet['sip'],
        ];
        mt_paramedis::create($datapar);
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan'
        ];
        echo json_encode($data);
    }
    public function user()
    {
        $menu = 'Data User';
        return view('adminmaster.user', compact([
            'menu'
        ]));
    }
    public function ambil_master_user()
    {
        $user = DB::select('select * from mt_user');
        return view('adminmaster.tabel_user', compact([
            'user'
        ]));
    }
    public function ambil_master_kary()
    {
        $par = DB::select('select * from mt_paramedis');
        return view('adminmaster.tabel_paramedis', compact([
            'par'
        ]));
    }
    public function ambil_master_tarif()
    {
        $tar = DB::select('select * from mt_tarif_header');
        return view('adminmaster.tabel_tarif_header', compact([
            'tar'
        ]));
    }
    public function detailuser(Request $request)
    {
        $user = DB::select('select * from mt_user where id =?', [$request->id]);
        $unit = DB::select('select * from mt_unit');
        return view('adminmaster.detailuser', compact([
            'user',
            'unit'
        ]));
    }
    public function simpaneditpasien(Request $request)
    {
        $data = json_decode($_POST['data'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        $data_user = [
            'username' =>$dataSet['username'],
            'nama' =>$dataSet['namauser'],
            'hak_akses' =>$dataSet['hakakses'],
            'unit' =>$dataSet['unit'],
            'kode_paramedis' =>$dataSet['kodeparamedis'],
            'is_activated' =>$dataSet['status'],
        ];
        User::where('id', $dataSet['id'])
            ->update($data_user);
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan'
        ];
        echo json_encode($data);
    }
    public function diagnosa()
    {
        $menu = 'DIAGNOSA';
        return view('adminmaster.diagnosa', compact([
            'menu'
        ]));
    }
    public function tarif()
    {
        $menu = 'TARIF';
        return view('adminmaster.tarif', compact([
            'menu'
        ]));
    }
    public function get_kode_paramedis()
    {
        $q = DB::select('SELECT ID,kode_paramedis,RIGHT(kode_paramedis,3) AS kd_max  FROM mt_paramedis ORDER BY ID DESC
        LIMIT 1');
        $kd = "";
        if (count($q) > 0) {
            foreach ($q as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'DOK'.$kd;
    }
}
