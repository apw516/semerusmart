<?php

namespace App\Http\Controllers;

use App\Models\modelkasirdetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\modelkasirheader;
use App\Models\ts_kunjungan;
use App\Models\ts_layanan_header;

class KeuanganController extends Controller
{
    public function index(){
        $now = $this->get_date();
        $menu = 'KASIR';
        return view('keuangan.index',compact([
            'menu',
            'now'
        ]));
    }
    public function laporankasir(){
        $now = $this->get_date();
        $menu = 'Laporan Pendapatan Kasir';
        return view('keuangan.laporankasir',compact([
            'menu',
            'now'
        ]));
    }
    public function ambil_antrian_kasir(Request $request)
    {
        $now = $this->get_date();
        $tglawal = $request->tglawal;
        $tglakhir = $request->tglakhir;
        $cari_antrian = DB::select('SELECT DATE(b.tgl_entry) AS tgl_masuk,b.no_rm,b.nama_px,fc_alamat(b.no_rm) AS alamat,a.kode_kunjungan,kode_registrasi FROM ts_kunjungan a
        LEFT OUTER JOIN mt_pasien b ON a.`no_rm` = b.`no_rm`
        WHERE DATE(a.tgl_masuk) BETWEEN ? AND ? AND a.status_kunjungan = 3',[$tglawal,$tglakhir]);
        return view('keuangan.tabel_antrian_kasir',compact([
            'cari_antrian',
            'now'
        ]));
    }
    public function Riwayat_pembayaran(Request $request)
    {
        $tglawal = $request->tglawal;
        $tglakhir = $request->tglakhir;
        $now = $this->get_date();
        $cari_antrian = DB::select('SELECT a.status_kunjungan,DATE(b.tgl_entry) AS tgl_masuk,b.no_rm,b.nama_px,fc_alamat(b.no_rm) AS alamat,a.kode_kunjungan,kode_registrasi FROM ts_kunjungan a
        LEFT OUTER JOIN mt_pasien b ON a.`no_rm` = b.`no_rm`
        WHERE DATE(a.tgl_masuk) BETWEEN ? AND ? AND a.status_kunjungan = ?',[$tglawal,$tglakhir,4]);
        return view('keuangan.tabel_riwayat_kasir',compact([
            'cari_antrian',
            'now'
        ]));
    }
    public function detail_pembayaran(Request $request){
        $kodekunjungan = $request->kodekunjungan;
        $detail = DB::select('SELECT a.status_layanan,b.status_layanan_detail,kode_kunjungan,a.kode_layanan_header,c.NAMA_TARIF,b.`grantotal_layanan` FROM ts_layanan_header a
        LEFT OUTER JOIN ts_layanan_detail b ON a.id = b.row_id_header
        LEFT OUTER JOIN mt_tarif_header c ON b.kode_tarif_detail = c.KODE_TARIF_HEADER
        WHERE kode_kunjungan = ?',[$request->kodekunjungan]);
        return view('keuangan.detail_pembayaran',compact([
            'detail',
            'kodekunjungan'
        ]));
    }
    public function hitung_kembalian(Request $request)
    {
        $gt = $request->gt;
        $ub = $request->ub;
        $kembalian = $ub - $gt;
        $data = [
            'kode' => 200,
            'kembalian' => $kembalian
        ];
        echo json_encode($data);
    }
    public function simpan_pembayaran(Request $request)
    {
        $kodekunjungan = $request->kodekunjungan;
        $gt = $request->gt;
        $uangbayar = $request->uangbayar;
        $kembalian = $request->kembalian;
        $kasir_header = [
            'kode_kasir_header' => '1',
            'kode_invoice' => $kodekunjungan,
            'tipe_trans_kasir' => '1',
            'tgl_trans_kasir' => $this->get_now(),
            'total_trans_kasir' => $uangbayar,
            'total_uang' => $uangbayar,
            'kembalian' => $kembalian,
            'pic' => auth()->user()->id,
        ];
        $kasir_header = modelkasirheader::create($kasir_header);
        $layanan_header = DB::select('select * from ts_layanan_header where kode_kunjungan = ? and status_layanan = ?',[$kodekunjungan,1]);
        foreach($layanan_header as $lh){
            $kasir_detail = [
                'kode_kasir_header' => '1',
                'kode_layanan_header' => $lh->kode_layanan_header,
                'kode_invoice' => $kodekunjungan,
                'sub_total' => $lh->total_layanan
            ];
            $kasir_detail = modelkasirdetail::create($kasir_detail);
        }
        $ts_kunjungan = [
            'status_kunjungan' => 4,
        ];
        $ts_ly_header = [
            'status_layanan' => 2,
        ];

        ts_kunjungan::where('kode_kunjungan', $kodekunjungan)
        ->update($ts_kunjungan);
        ts_layanan_header::where('kode_kunjungan', $kodekunjungan)
        ->update($ts_ly_header);

        $data = [
            'kode' => 200,
            'message' => 'berhasil !'
        ];
        echo json_encode($data);
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
    public function ambilriwayat_bayar_kasir(Request $request)
    {
        $kd = $request->kodekunjungan;
    }
}
