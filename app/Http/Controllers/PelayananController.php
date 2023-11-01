<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\assesment_dokter;
use App\Models\trx_layanan;
use App\Models\ts_kunjungan;
use App\Models\ts_layanan_detail;
use App\Models\ts_layanan_header;
use Carbon\Carbon;

class PelayananController extends Controller
{
    public function Index()
    {
        $menu = 'ERM - Pasien';
        return view('Pelayanan.index', compact([
            'menu'
        ]));
    }
    public function riwayatpelayanan()
    {
        $menu = 'Riwayat Pelayanan';
        return view('Pelayanan.riwayatpelayanan', compact([
            'menu'
        ]));
    }
    public function AntrianErm()
    {
        $antrian = DB::select('SELECT kode_kunjungan,kode_registrasi,a.no_rm,nama_px,status_kunjungan FROM ts_kunjungan a JOIN mt_pasien b ON a.`no_rm` = b.no_rm
        WHERE DATE(tgl_masuk) = CURDATE() AND status_kunjungan != ?', [99]);
        return view('pelayanan.table_antrian_erm', compact([
            'antrian'
        ]));
    }
    public function FormErm(Request $request)
    {
        $datakunjungan = DB::select('SELECT * from ts_kunjungan where kode_kunjungan = ?', [$request->kodekunjungan]);
        $mt_pasien = DB::select('SELECT * from mt_pasien where no_rm = ?', [$request->rm]);
        $assesment = DB::select('SELECT * from assesment_dokter where kodekunjungan = ?', [$request->kodekunjungan]);
        $cs = count($assesment);
        $cm = DB::select('SELECT * FROM ts_kunjungan a
        INNER JOIN assesment_dokter b ON a.`kode_kunjungan` = b.`kodekunjungan` WHERE a.no_rm = ?', [$mt_pasien[0]->no_rm]);
        $tarif = DB::SELECT('SELECT a.KODE_TARIF_HEADER,KODE_TARIF_DETAIL,NAMA_TARIF,TOTAL_TARIF_CURRENT,TOTAL_TARIF_NEW FROM mt_tarif_header a
        INNER JOIN mt_tarif_detail b ON a.`KODE_TARIF_HEADER` = b.`KODE_TARIF_HEADER`
        WHERE b.`KELAS_TARIF` = 3 LIMIT 100');
        return view('pelayanan.form_erm', compact([
            'datakunjungan',
            'mt_pasien',
            'assesment',
            'cs',
            'cm',
            'tarif'
        ]));
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
    public function SimpanAssesment(Request $request)
    {
        $data = json_decode($_POST['data'], true);
        $data_tindakan = json_decode($_POST['data_tindakan'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $ass[$index] = $value;
        }
        $datakunjungan = DB::select('SELECT tgl_masuk,status_kunjungan from ts_kunjungan where kode_kunjungan = ?', [$ass['kodekunjungan']]);
        if($datakunjungan[0]->status_kunjungan == 4){
            $status_kj = 4;
        }else{
            $status_kj = 3;
        }
        $data_assesment = [
            'kodekunjungan' => $ass['kodekunjungan'],
            'tglkunjungan' => $datakunjungan[0]->tgl_masuk,
            'tglentry' => $this->get_now(),
            'tekanandarah' => $ass['tekanandarah'],
            'suhutubuh' => $ass['suhutubuh'],
            'hasilpemeriksaan' => $ass['hasilpemeriksaan'],
            'diagnosa' => $ass['diagnosa'],
            'pic' => auth()->user()->id
        ];
        $cek_assesment = DB::select('SELECT id from assesment_dokter where kodekunjungan = ?', [$ass['kodekunjungan']]);
        if (count($cek_assesment) > 0) {
            assesment_dokter::where('kodekunjungan', $ass['kodekunjungan'])
                ->update($data_assesment);
        } else {
            assesment_dokter::create($data_assesment);
        }
        //input tindakan
        if (count($data_tindakan) > 0) {
            foreach ($data_tindakan as $namatindakan) {
                $index = $namatindakan['name'];
                $value = $namatindakan['value'];
                $dataSet[$index] = $value;
                if ($index == 'disc') {
                    $arrayindex_tindakan[] = $dataSet;
                }
            }
            $kode_layanan_header = $this->createKodeHeader();
            $data_tx_header = [
                'tgl' => $this->get_now(),
                'no_trx_layanan' => $kode_layanan_header,
                'unit' => '1001'
            ];
            trx_layanan::create($data_tx_header);
            $data_header = [
                'tgl_entry' => $this->get_now(),
                'kode_kunjungan' => $ass['kodekunjungan'],
                'kode_layanan_header' => $kode_layanan_header,
                'kode_tipe_transaksi' => '1',
                'status_layanan' => '8',
                'status_pembayaran' => '8',
                'pic' => auth()->user()->id
            ];
            $layanan_header = ts_layanan_header::create($data_header);
            $total_tarif = 0;
            foreach ($arrayindex_tindakan as $a) {
                $tarif1 =$a['qty'] * $a['tarif'];
                $data_detail = [
                    'id_layanan_detail' => 'DET123123123',
                    'kode_layanan_header' => $kode_layanan_header,
                    'kode_tarif_detail' => $a['kodelayanan'],
                    'total_tarif' => $a['tarif'],
                    'jumlah_layanan' => $a['qty'],
                    'total_layanan' => $a['qty'] * $a['tarif'],
                    'diskon_layanan' => $a['disc'],
                    'grantotal_layanan' => $a['qty'] * $a['tarif'],
                    'kode_dokter1' => '12',
                    'status_layanan_detail' => '1',
                    'tgl_layanan_detail' => $this->get_now(),
                    'tgl_layanan_detail_2' => $this->get_now(),
                    'tagihan_pribadi' => $a['qty'] * $a['tarif'],
                    'tagihan_penjamin' => '0',
                    'row_id_header' => $layanan_header->id,
                ];
                ts_layanan_detail::create($data_detail);
                $total_tarif = $total_tarif + $tarif1;
                //insert ts_layanan_detail
            }
            $data_header_update = [
                'status_layanan' => 1,
                'status_pembayaran' => 1,
                'total_layanan' => $total_tarif,
            ];
            ts_layanan_header::where('id', $layanan_header->id)
            ->update($data_header_update);
            $status_kj = 3;
        }
        //update ts_kunjungan
        $ts_kunjungan = [
            'status_kunjungan' => $status_kj,
            'tanda_vital' => $ass['tekanandarah'] . '|' . $ass['suhutubuh'],
            'keluhanutama' => $ass['keluhanutama'],
        ];
        ts_kunjungan::where('kode_kunjungan', $ass['kodekunjungan'])
            ->update($ts_kunjungan);
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan'
        ];
        echo json_encode($data);
    }
    public function createKodeHeader()
    {
        $q = DB::select('SELECT id,RIGHT(no_trx_layanan,6) AS kd_max  FROM mt_nomor_trx
        WHERE DATE(tgl) = CURDATE()
        ORDER BY id DESC
        LIMIT 1');
        $kd = "";
        if (count($q) > 0) {
            foreach ($q as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'LYN' . date('ymd') . $kd;
    }
    public function AmbilRiwayatTindakan(Request $request)
    {
        $kode = $request->kodekunjungan;
        $r = db::select('SELECT a.id,b.id as id_detail,a.`kode_layanan_header`,b.`total_tarif`,c.`NAMA_TARIF`,a.status_layanan,b.status_layanan_detail FROM ts_layanan_header a
        LEFT OUTER JOIN ts_layanan_detail b ON a.`id` = b.`row_id_header`
        LEFT OUTER JOIN mt_tarif_header c ON b.`kode_tarif_detail` = c.`KODE_TARIF_HEADER` where a.kode_kunjungan = ?',[$kode]);
        return view('Pelayanan.tabel_riwayat_tindakan',compact([
            'r','kode'
        ]));
    }
    public function retursatulayanan(Request $request)
    {
        $id_detail = $request->kode;
        $ts_layanan_detail = DB::select('select * from ts_layanan_detail where id = ?',[$id_detail]);
        $ts_layanan_header = DB::select('select * from ts_layanan_header where id = ?',[$ts_layanan_detail[0]->row_id_header]);
        if($ts_layanan_header[0]->status_layanan == 2){
            $data = [
                'kode' => 500,
                'message' => 'Gagal Retur, Layanan Sudah dibayar !'
            ];
            echo json_encode($data);
            die;
        }else{
            if($ts_layanan_detail[0]->status_layanan_detail == 8){
                $data = [
                    'kode' => 500,
                    'message' => 'Layanan sudah diretur !'
                ];
                echo json_encode($data);
                die;
            }
            $data_retur = [
                'jumlah_retur'=>1,
                'total_layanan' => 0,
                'grantotal_layanan' => 0,
                'tagihan_pribadi' => 0,
                'status_layanan_detail' => 8,
            ];
            $total_layanan = $ts_layanan_header[0]->total_layanan;
            $total_layanan_detail = $ts_layanan_detail[0]->grantotal_layanan;
            $total_layanan_baru = $total_layanan - $total_layanan_detail;
            if($total_layanan_baru <= 0){
                $status_layanan = 8;
                $status_retur = 'CLS';
            }else{
                $status_layanan = 1;
                $status_retur = 'opn';
            }
            $data_header = [
                'total_layanan' => $total_layanan_baru,
                'status_layanan' => $status_layanan,
                'status_retur' => $status_retur,
            ];
            ts_layanan_detail::where('id', $id_detail)->update($data_retur);
            ts_layanan_header::where('id', $ts_layanan_detail[0]->row_id_header)->update($data_header);
            $data = [
                'kode' => 200,
                'message' => 'Data berhasil disimpan'
            ];
            echo json_encode($data);

        }
    }
}
