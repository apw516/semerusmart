<?php

namespace App\Http\Controllers;

use App\Models\modelkasirdetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\modelkasirheader;
use App\Models\ts_kunjungan;
use App\Models\ts_layanan_header;
use App\Models\ts_layanan_detail;

class KeuanganController extends Controller
{
    public function index()
    {
        $now = $this->get_date();
        $menu = 'KASIR';
        return view('keuangan.index', compact([
            'menu',
            'now'
        ]));
    }
    public function laporankasir()
    {
        $now = $this->get_date();
        $menu = 'Laporan Pendapatan Kasir';
        return view('keuangan.laporankasir', compact([
            'menu',
            'now'
        ]));
    }
    public function ambil_antrian_kasir(Request $request)
    {
        $now = $this->get_date();
        $tglawal = $request->tglawal;
        $tglakhir = $request->tglakhir;
        $cari_antrian = DB::select('SELECT DATE(b.tgl_entry) AS tgl_masuk,b.no_rm,b.nama_px,fc_alamat(b.no_rm) AS alamat,a.kode_kunjungan,kode_registrasi ,a.status_kunjungan FROM ts_kunjungan a
        LEFT OUTER JOIN mt_pasien b ON a.`no_rm` = b.`no_rm`
        WHERE DATE(a.tgl_masuk) BETWEEN ? AND ?', [$tglawal, $tglakhir]);
        return view('keuangan.tabel_antrian_kasir', compact([
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
        WHERE DATE(a.tgl_masuk) BETWEEN ? AND ? AND a.status_kunjungan = ?', [$tglawal, $tglakhir, 4]);
        return view('keuangan.tabel_riwayat_kasir', compact([
            'cari_antrian',
            'now'
        ]));
    }
    public function detail_pembayaran(Request $request)
    {
        $kodekunjungan = $request->kodekunjungan;
        $detail = DB::select('SELECT a.status_layanan,b.status_layanan_detail,kode_kunjungan,a.kode_layanan_header,c.NAMA_TARIF,b.`grantotal_layanan`,b.status_layanan_detail FROM ts_layanan_header a
        LEFT OUTER JOIN ts_layanan_detail b ON a.id = b.row_id_header
        LEFT OUTER JOIN mt_tarif_header c ON b.kode_tarif_detail = c.KODE_TARIF_HEADER
        WHERE kode_kunjungan = ?', [$request->kodekunjungan]);
        return view('keuangan.detail_pembayaran', compact([
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
        $layanan_header = DB::select('select * from ts_layanan_header where kode_kunjungan = ? and status_layanan = ?', [$kodekunjungan, 1]);
        // foreach($layanan_header as $lyh){
        //     $layanan_detail = DB::select('select * from ts_layanan_detail where row_id_header = ? and status_layanan_detail = ?', [$lyh->id, 1]);
        // }
        $kode_kasir_header = $this->get_kode_kasir();
        $kasir_header = [
            'kode_kasir_header' => $kode_kasir_header,
            'kode_invoice' => $kodekunjungan,
            'tipe_trans_kasir' => '1',
            'tgl_trans_kasir' => $this->get_now(),
            'total_uang' => $uangbayar,
            'kembalian' => $kembalian,
            'pic' => auth()->user()->id,
        ];
        $kasir_header = modelkasirheader::create($kasir_header);
        $total_trans_kasir = 0;
        foreach ($layanan_header as $lh) {
            $layanan_detail = DB::select('select * from ts_layanan_detail where row_id_header = ? and status_layanan_detail = ?', [$lh->id, 1]);
            $total_trans_kasir = $lh->total_layanan + $total_trans_kasir;
            foreach ($layanan_detail as $dt) {
                $kasir_detail = [
                    'kode_kasir_header' =>  $kode_kasir_header,
                    'kode_layanan_header' => $dt->kode_layanan_header,
                    'kode_invoice' => $dt->id_layanan_detail,
                    'sub_total' => $dt->grantotal_layanan
                ];
                $kasir_detail = modelkasirdetail::create($kasir_detail);
                $ts_layanan_detail = [
                    'status_layanan_detail' => '2'
                ];
                ts_layanan_detail::where('id_layanan_detail', $dt->id_layanan_detail)->update($ts_layanan_detail);
            }
        }
        $row_id_header = $layanan_header[0]->id;
        $ts_kunjungan = [
            'status_kunjungan' => 4,
        ];
        $ts_ly_header = [
            'status_layanan' => 2,
        ];
        $update_kasir_header = [
            'total_trans_kasir' => $total_trans_kasir
        ];
        modelkasirheader::where('id_trans_kasir', $kasir_header->id)->update($update_kasir_header);
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
        $kode = $request->kodekunjungan;
        $r = db::select('SELECT a.id,b.id as id_detail,a.`kode_layanan_header`,a.total_layanan,b.grantotal_layanan,b.`total_tarif`,c.`NAMA_TARIF`,a.status_layanan,b.status_layanan_detail FROM ts_layanan_header a
        LEFT OUTER JOIN ts_layanan_detail b ON a.`id` = b.`row_id_header`
        LEFT OUTER JOIN mt_tarif_header c ON b.`kode_tarif_detail` = c.`KODE_TARIF_HEADER` where a.kode_kunjungan = ?', [$kode]);
        $header = db::select('select * from ts_layanan_header where kode_kunjungan = ?', [$kode]);
        $detail_kasir = db::select('select * from ts_kasir_header where kode_invoice = ?', [$kode]);
        // DD($detail_kasir);
        return view('keuangan.detail_riwayat_pembayaran', compact([
            'r', 'kode', 'header', 'detail_kasir'
        ]));
    }
    public function  get_kode_kasir()
    {
        $q = DB::select('SELECT id_trans_kasir,RIGHT(kode_kasir_header,6) AS kd_max  FROM ts_kasir_header
        WHERE DATE(tgl_trans_kasir) = CURDATE()
        ORDER BY tgl_trans_kasir DESC
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
        return 'KSR' . date('ymd') . $kd;
    }
    public function ambil_laporan_kasir(Request $request)
    {
        $tgl_awal = $request->tanggalawal;
        $tgl_akhir = $request->tanggalakhir;
        $hasil = DB::select('SELECT b.`no_rm`,fc_nama_px(b.`no_rm`) AS nama_pasien,tgl_trans_kasir,total_trans_kasir,total_uang,kembalian,a.`kode_kasir_header` FROM ts_kasir_header a
       LEFT OUTER JOIN ts_kunjungan b ON a.`kode_invoice` = b.`kode_kunjungan`
       WHERE DATE(tgl_trans_kasir) BETWEEN ? AND ?', [$tgl_awal, $tgl_akhir]);
        return view('keuangan.tabellaporankasir', compact(
            [
                'hasil'
            ]
        ));
    }
}
