<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamedisController extends Controller
{
    public function Index()
    {
        $menu = 'Pendaftaran';
        $agama = DB::select('select * from mt_agama');
        $pendidikan = DB::select('select * from mt_pendidikan');
        $pekerjaan = DB::select('select * from mt_pekerjaan');
        $status_perkawinan = DB::select('select * from mt_status_perkawinan');
        return view('Pendaftaran.index', compact([
            'menu',
            'agama',
            'pendidikan',
            'pekerjaan',
            'status_perkawinan'
        ]));
    }
    public function AmbilDataPasien()
    {
        $pasien = DB::select('select * from mt_pasien');

        return view('pendaftaran.tabelpasien', compact([
            'pasien'
        ]));
    }
    public function CariProvinsi(Request $request){
        $result = DB::table('mt_lokasi_provinces')->where('name', 'LIKE', '%' . $request['term'] . '%')->get();
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->name,
                    'kode' => $row->id,
                );
            echo json_encode($arr_result);
        }
    }
    public function CariKabupaten(Request $request){
        $result = DB::table('mt_lokasi_regencies')->where('name', 'LIKE', '%' . $request['term'] . '%')->get();
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->name,
                    'kode' => $row->id,
                );
            echo json_encode($arr_result);
        }
    }
    public function CariKecamatan(Request $request){
        $result = DB::table('mt_lokasi_districts')->where('name', 'LIKE', '%' . $request['term'] . '%')->get();
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->name,
                    'kode' => $row->id,
                );
            echo json_encode($arr_result);
        }
    }
    public function CariDesa(Request $request){
        $result = DB::table('mt_lokasi_villages')->where('name', 'LIKE', '%' . $request['term'] . '%')->get();
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->name,
                    'kode' => $row->id,
                );
            echo json_encode($arr_result);
        }
    }
    public function SimpanPasienBaru(Request $request)
    {
        $data = json_decode($_POST['data'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        $data_pasien = [
            'no_rm' => '123',
            'nik' =>$dataSet['nik'],
            'no_asuransi' =>$dataSet['nomorasuransi'] ,
            'nama_px' => $dataSet['namapx'],
            'jenis_kelamin' =>$dataSet['jeniskelamin'] ,
            'tempat_lahir' => $dataSet['tempatlahir'],
            'tgl_lahir' => $dataSet['tanggallahir'],
            'desa' =>$dataSet['kodedesa'] ,
            'kecamatan' =>$dataSet['kodekecamatan'] ,
            'kotakab' =>$dataSet['kodekabupaten'] ,
            'propinsi' => $dataSet['kodeprovinsi'],
            'negara' => $dataSet['nik'],
            'agama' =>$dataSet['agama'] ,
            'pekerjaan' =>$dataSet['pekerjaan'] ,
            'pendidikan' =>$dataSet['pendidikan'] ,
            'status_perkawinan' => $dataSet['statusperkawinan'],
        ];
        dd($data_pasien);
    }
}
