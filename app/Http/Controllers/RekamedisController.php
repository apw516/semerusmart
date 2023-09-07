<?php

namespace App\Http\Controllers;

use App\Models\mt_pasien;
use App\Models\ts_kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $pasien = DB::select('select * from mt_pasien where date(tgl_entry) = curdate()');

        return view('pendaftaran.tabelpasien', compact([
            'pasien'
        ]));
    }
    public function AmbilAntrian()
    {
        $antrian = DB::select('SELECT kode_kunjungan,kode_registrasi,a.no_rm,nama_px,status_kunjungan FROM ts_kunjungan a JOIN mt_pasien b ON a.`no_rm` = b.no_rm
        WHERE DATE(tgl_masuk) = CURDATE()');
        return view('pendaftaran.table_antrian', compact([
            'antrian'
        ]));
    }
    public function AmbilRiwayatDaftar()
    {
        $datakunjungan = DB::select('select * from ts_kunjungan where date(tgl_masuk) = curdate()');
        return view('Pendaftaran.tabelriwayatpendaftaran',compact([
            'datakunjungan'
        ]));
    }
    public function AmbilFormPendaftaran(Request $request)
    {
        $dtpx = DB::select('select * from mt_pasien where no_rm = ?',[$request->rm]);
        return view('Pendaftaran.form_pendaftaran',compact([
            'dtpx'
        ]));
    }
    public function CariProvinsi(Request $request){
        $result = DB::table('mt_lokasi_provinces')->where('name', 'LIKE', '%' . $request['prov'] . '%')->get();
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
        // dd($request->prov);
        $result = DB::table('mt_lokasi_regencies')->where('name', 'LIKE', '%' . $request['kab'] . '%')->where('province_id', '=', $request->prov)->get();
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
        $result = DB::table('mt_lokasi_districts')->where('name', 'LIKE', '%' . $request['kec'] . '%')->where('regency_id', '=', $request->kab)->get();
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
        $result = DB::table('mt_lokasi_villages')->where('name', 'LIKE', '%' . $request['des'] . '%')->where('district_id', '=', $request->kec)->get();
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
        if($dataSet['namapx'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Nama pasien tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['tempatlahir'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Tempat Lahir tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['tanggallahir'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Tanggal Lahir tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['agama'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Agama tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['statusperkawinan'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Status perkawinan tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['pendidikan'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Pendidikan tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['pekerjaan'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Pekerjaan tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['kodeprovinsi'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Provinsi tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['kodekabupaten'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Kabupaten tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['kodekecamatan'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'kecamatan tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        if($dataSet['kodedesa'] == ''){
            $data = [
                'kode' => 500,
                'message' => 'Desa tidak boleh kosong !'
            ];
            echo json_encode($data);
            die;
        }
        $data_pasien = [
            'no_rm' => $this->get_rm(),
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
            'tgl_entry' => $this->get_now()
        ];
        mt_pasien::create($data_pasien);
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan'
        ];
        echo json_encode($data);
    }
    public function SimpanPendaftaran(Request $request)
    {
        $data = json_decode($_POST['data'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        $cek_rm = DB::select('select * from ts_kunjungan where no_rm = ?', [$dataSet['nomorrm']]);
        $cek_antrian = DB::select('select COUNT(kode_kunjungan) as total_antrian from ts_kunjungan where date(tgl_masuk) = ?', [$this->get_date()]);
        if($cek_antrian[0]->total_antrian == 0){
            $nomor_antrian = 'A'.'1';
        }else{
            $nomor_antrian = 'A'.$cek_antrian[0]->total_antrian + 1;
        }
        if (count($cek_rm) == 0) {
            $counter = 1;
        } else {
            foreach ($cek_rm as $c)
                $arr_counter[] = array(
                    'counter' => $c->counter
                );
            $last_count = max($arr_counter);
            $counter = $last_count['counter'] + 1;
        }
        $data_kunjungan = [
            'counter' => $counter,
            'kode_registrasi' => $this->createkodereg(),
            'no_rm' => $dataSet['nomorrm'],
            'tgl_masuk' => $this->get_now(),
            'kode_paramedis' => $dataSet['dokter'],
            'kode_unit' => $dataSet['tujuan'],
            'status_kunjungan' => '1',
            'ref_unit' => '0',
            'ref_kunjungan' => '0',
            'kode_penjamin' => 'P01',
            'tanda_vital' => $dataSet['tekanandarah'].'|'.$dataSet['suhutubuh'],
            'keluhan_utama' => $dataSet['keluhanutama'],
            'picx`' => '',
        ];
        ts_kunjungan::create($data_kunjungan);
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan'
        ];
        echo json_encode($data);
    }
    public function get_rm()
    {
        $y = DB::select('SELECT MAX(RIGHT(no_rm,6)) AS kd_max FROM mt_pasien');
        if (count($y) > 0) {
            foreach ($y as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('y') . $kd;
    }
    public function get_now()
    {
        $dt = Carbon::now()->timezone('Asia/Jakarta');
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        $now = $date . ' ' . $time;
        return $now;
    }
    public function get_date()
    {
        $dt = Carbon::now()->timezone('Asia/Jakarta');
        $date = $dt->toDateString();
        $now = $date;
        return $now;
    }
    public function createkodereg()
    {
        $q = DB::select('SELECT kode_kunjungan,kode_registrasi,RIGHT(kode_registrasi,3) AS kd_max  FROM ts_kunjungan
        WHERE DATE(tgl_masuk) = CURDATE()
        ORDER BY kode_kunjungan DESC
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
        return 'A' . date('ymd') . $kd;
    }
}
