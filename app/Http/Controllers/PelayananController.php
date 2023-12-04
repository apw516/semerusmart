<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\assesment_dokter;
use App\Models\mt_log_sediaan;
use App\Models\mt_sediaan;
use App\Models\Tarif_detail;
use App\Models\ti_kartu_stok;
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
        WHERE DATE(tgl_masuk) = CURDATE() AND status_kunjungan != ?', [5]);
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
        $rto = DB::select('SELECT a.`kode_kunjungan`,b.`kode_tarif_detail`,c.NAMA_TARIF,a.catatan,b.`jumlah_layanan` FROM ts_layanan_header a
        LEFT OUTER JOIN ts_layanan_detail b ON a.`id` = b.row_id_header
        LEFT OUTER JOIN mt_tarif_header c ON b.`kode_tarif_detail` = c.`KODE_TARIF_HEADER`
        WHERE a.`kode_kunjungan` = ? AND b.`status_layanan_detail` != ?', [$request->kodekunjungan, 8]);
        $tarif = DB::SELECT('SELECT a.KODE_TARIF_HEADER,KODE_TARIF_DETAIL,NAMA_TARIF,TOTAL_TARIF_CURRENT,TOTAL_TARIF_NEW FROM mt_tarif_header a
        INNER JOIN mt_tarif_detail b ON a.`KODE_TARIF_HEADER` = b.`KODE_TARIF_HEADER`
        WHERE b.`KELAS_TARIF` = 3 AND a.KELOMPOK_TARIF_ID < 3');
        $tarif_lab = DB::SELECT('SELECT a.KODE_TARIF_HEADER,KODE_TARIF_DETAIL,NAMA_TARIF,TOTAL_TARIF_CURRENT,TOTAL_TARIF_NEW FROM mt_tarif_header a
        INNER JOIN mt_tarif_detail b ON a.`KODE_TARIF_HEADER` = b.`KODE_TARIF_HEADER`
        WHERE b.`KELAS_TARIF` = 3 AND a.KELOMPOK_TARIF_ID = 3');
        $obat = DB::SELECT('SELECT a.KODE_TARIF_HEADER,KODE_TARIF_DETAIL,NAMA_TARIF,TOTAL_TARIF_CURRENT,TOTAL_TARIF_NEW,STOK_CURRENT FROM mt_tarif_header a
        INNER JOIN mt_tarif_detail b ON a.`KODE_TARIF_HEADER` = b.`KODE_TARIF_HEADER`
        WHERE b.`KELAS_TARIF` = 3 AND a.KELOMPOK_TARIF_ID = 4');
        return view('pelayanan.form_erm', compact([
            'datakunjungan',
            'mt_pasien',
            'assesment',
            'cs',
            'cm',
            'tarif',
            'tarif_lab',
            'obat',
            'rto'
        ]));
    }
    public function tampilobatpaket()
    {
        $title = 'Data Obat Paket';
        $obat = DB::SELECT('SELECT a.KODE_TARIF_HEADER,KODE_TARIF_DETAIL,NAMA_TARIF,TOTAL_TARIF_CURRENT,TOTAL_TARIF_NEW FROM mt_tarif_header a
        INNER JOIN mt_tarif_detail b ON a.`KODE_TARIF_HEADER` = b.`KODE_TARIF_HEADER`
        WHERE b.`KELAS_TARIF` = 1 AND a.KELOMPOK_TARIF_ID > 3');
        return view('Pelayanan.tabel_obat_paket', compact([
            'obat',
            'title'
        ]));
    }
    public function tampilobatpaten()
    {
        $title = 'Data Obat Paten';
        $obat = DB::SELECT('SELECT a.KODE_TARIF_HEADER,KODE_TARIF_DETAIL,NAMA_TARIF,TOTAL_TARIF_CURRENT,TOTAL_TARIF_NEW FROM mt_tarif_header a
        INNER JOIN mt_tarif_detail b ON a.`KODE_TARIF_HEADER` = b.`KODE_TARIF_HEADER`
        WHERE b.`KELAS_TARIF` = 3 AND a.KELOMPOK_TARIF_ID > 3');
        return view('Pelayanan.tabel_obat_paket', compact([
            'obat',
            'title'
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
        $data_obat = json_decode($_POST['data_obat'], true);
        $data_lab = json_decode($_POST['data_lab'], true);

        if (count($data_obat) > 0) {
            foreach ($data_obat as $no) {
                $index = $no['name'];
                $value = $no['value'];
                $dataSet[$index] = $value;
                if ($index == 'aturanpakai') {
                    $arrayindex_obat[] = $dataSet;
                }
            }
            // dd($arrayindex_obat);
            foreach ($arrayindex_obat as $o) {
                $cek_stok = DB::select('select STOK_CURRENT from mt_tarif_detail where KODE_TARIF_HEADER = ? AND KELAS_TARIF = ?', [$o['kodelayanan'], 3]);
                if ($cek_stok[0]->STOK_CURRENT < 0 || $cek_stok[0]->STOK_CURRENT == NULL) {
                    dd('stok tidak ada');
                } else {
                    $stok_current1 = $cek_stok[0]->STOK_CURRENT - $o['qty'];
                    if ($stok_current1 < 0) {
                        $data = [
                            'kode' => 500,
                            'message' => 'Stok obat ' . $o['namatindakan'] . ' Tidak cukup !'
                        ];
                        echo json_encode($data);
                        die;
                    }
                }
            }
        }
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $ass[$index] = $value;
        }
        $datakunjungan = DB::select('SELECT tgl_masuk,status_kunjungan from ts_kunjungan where kode_kunjungan = ?', [$ass['kodekunjungan']]);
        if ($datakunjungan[0]->status_kunjungan == 4) {
            $status_kj = 4;
        } else {
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
        $cek_layanan_header = DB::select('select * from ts_layanan_header where kode_kunjungan = ? and status_layanan = ?', [$ass['kodekunjungan'], '8']);
        if (count($cek_layanan_header) > 0) {
            $cek = 0;
            foreach ($cek_layanan_header as $c) {
                $detail = db::Select('select * from ts_layanan_detail where row_id_header = ?', [$c->id]);
                foreach ($detail as $dt) {
                    if ($dt->status_layanan_detail == 1) {
                        $cek = $cek + 1;
                    }
                }
            }
            if ($cek > 0) {
                $status_kj = 3;
            } else {
                $status_kj = 4;
            }
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
                'catatan' => 'TINDAKAN',
                'pic' => auth()->user()->id
            ];
            $layanan_header = ts_layanan_header::create($data_header);
            $total_tarif = 0;
            foreach ($arrayindex_tindakan as $a) {
                $tarif1 = $a['qty'] * $a['tarif'];
                $kode_layanan_detail = $this->get_kode_detail();
                $data_detail = [
                    'id_layanan_detail' => $kode_layanan_detail,
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
        //input obat
        if (count($data_obat) > 0) {
            foreach ($data_obat as $a) {
                $index = $a['name'];
                $value = $a['value'];
                $dataSet1[$index] = $value;
                if ($index == 'aturanpakai') {
                    $arrayindex_obat1[] = $dataSet1;
                }
            }
            $kode_layanan_header = $this->createKodeHeader();
            $data_tx_header = [
                'tgl' => $this->get_now(),
                'no_trx_layanan' => $kode_layanan_header,
                'unit' => '4002'
            ];
            trx_layanan::create($data_tx_header);
            $data_header = [
                'tgl_entry' => $this->get_now(),
                'kode_kunjungan' => $ass['kodekunjungan'],
                'kode_layanan_header' => $kode_layanan_header,
                'kode_tipe_transaksi' => '1',
                'status_layanan' => '8',
                'status_pembayaran' => '8',
                'catatan' => 'FARMASI',
                'pic' => auth()->user()->id
            ];
            $layanan_header = ts_layanan_header::create($data_header);
            $total_tarif = 0;
            foreach ($arrayindex_obat as $a) {
                //mencari paket atau bukan
                if ($a['paket'] == 0) {
                    $tarif = 0;
                } else {
                    $tarif = $a['tarif'];
                }
                $cek_stok = DB::select('select STOK_CURRENT from mt_tarif_detail where KODE_TARIF_HEADER = ? AND KELAS_TARIF = ?', [$a['kodelayanan'], 3]);
                $stok_last =  $cek_stok[0]->STOK_CURRENT;
                $stok_current = $stok_last - $a['qty'];
                $tarif1 = $a['qty'] * $tarif;
                $kode_layanan_detail = $this->get_kode_detail();
                $data_detail = [
                    'id_layanan_detail' => $kode_layanan_detail,
                    'kode_layanan_header' => $kode_layanan_header,
                    'kode_tarif_detail' => $a['kodelayanan'],
                    'total_tarif' => $a['tarif'],
                    'jumlah_layanan' => $a['qty'],
                    'total_layanan' => $a['qty'] * $tarif,
                    'grantotal_layanan' => $tarif1,
                    'kode_dokter1' => '12',
                    'status_layanan_detail' => '1',
                    'aturan_pakai' => $a['aturanpakai'],
                    'tgl_layanan_detail' => $this->get_now(),
                    'tgl_layanan_detail_2' => $this->get_now(),
                    'tagihan_pribadi' => $a['qty'] * $tarif,
                    'tagihan_penjamin' => '0',
                    'row_id_header' => $layanan_header->id,
                ];
                $ts_layanan_Detail_s = ts_layanan_detail::create($data_detail);
                $total_tarif = $total_tarif + $tarif1;
                //insert ts_layanan_detail
                $update_detail = [
                    'STOK_CURRENT' => $stok_current
                ];
                Tarif_detail::where('KODE_TARIF_HEADER', $a['kodelayanan'])->update($update_detail);
                $tarif_header = DB::select('select * from mt_tarif_header where KODE_TARIF_HEADER = ?', [$a['kodelayanan']]);
                $mt_barang = DB::select('select * from mt_barang where id_tarif_header = ?', [$tarif_header[0]->idx]);
                $cek_stok2 = db::select('SELECT * FROM ti_kartu_stok WHERE NO = ( SELECT MAX(a.no ) AS nomor FROM ti_kartu_stok a WHERE kode_barang = ?)', ([$mt_barang[0]->kode_barang]));
                //ambil mt_barang by id_tarif_header
                $ti_kartu_stok = [
                    'no_dokumen_detail' => $kode_layanan_detail,
                    'tgl_stok' => $this->get_now(),
                    'kode_unit' => auth()->user()->unit,
                    'kode_barang' => $mt_barang[0]->kode_barang,
                    'stok_last' => $cek_stok2[0]->stok_current,
                    'stok_out' => $a['qty'],
                    'stok_current' => $stok_current,
                    'harga_beli' => $cek_stok2[0]->harga_beli,
                    'input_by' => auth()->user()->id,
                    'harga_beli_history' => $cek_stok2[0]->harga_beli_history,
                ];
                ti_kartu_stok::create($ti_kartu_stok);
                $stok_p = -1;
                $no = 0;
                while ($stok_p < 0) {
                    $STOK_SEDIAAN = db::select('SELECT * FROM ti_stok_pesediaan WHERE kode_barang = ?  AND ed IN (SELECT MIN(ed) FROM ti_stok_pesediaan where stok > ? AND kode_barang = ?)', [$mt_barang[0]->kode_barang, 0, $mt_barang[0]->kode_barang]);
                    $stok_current_sediaan = $STOK_SEDIAAN[0]->stok;
                    if ($no == 0) {
                        $stok_out = $stok_current_sediaan - $a['qty'];
                    } else {
                        $stok_out = $stok_current_sediaan + $stok_p;
                    }
                    if ($stok_out < 0) {
                        $stok_sediaan = 0;
                        $stok_log = $stok_current_sediaan;
                    } else {
                        $stok_sediaan = $stok_out;
                        $stok_log = $stok_current_sediaan - $stok_out;
                    }
                    $data = [
                        'stok' => $stok_sediaan,
                        'last_update' => $this->get_now()
                    ];
                    mt_sediaan::where('id', $STOK_SEDIAAN[0]->id)->update($data);
                    $data_log_sediaan = [
                        'id_sediaan' => $STOK_SEDIAAN[0]->id,
                        'id_detail' => $ts_layanan_Detail_s->id,
                        'stok_out' => $stok_log,
                        'stok_last' => $stok_current_sediaan,
                    ];
                    mt_log_sediaan::create($data_log_sediaan);
                    $stok_p = $stok_out;
                    $no++;
                }
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
    public function get_kode_detail()
    {
        $q = DB::select('SELECT id,RIGHT(id_layanan_detail,6) AS kd_max  FROM ts_layanan_detail
        WHERE DATE(tgl_layanan_detail) = CURDATE()
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
        return 'DET' . date('ymd') . $kd;
    }
    public function AmbilRiwayatTindakan(Request $request)
    {
        $kode = $request->kodekunjungan;
        $r = db::select('SELECT a.id,b.id as id_detail,a.`kode_layanan_header`,b.`total_tarif`,c.`NAMA_TARIF`,a.status_layanan,b.status_layanan_detail FROM ts_layanan_header a
        LEFT OUTER JOIN ts_layanan_detail b ON a.`id` = b.`row_id_header`
        LEFT OUTER JOIN mt_tarif_header c ON b.`kode_tarif_detail` = c.`KODE_TARIF_HEADER` where a.kode_kunjungan = ? and a.catatan = ?', [$kode, 'TINDAKAN']);
        return view('Pelayanan.tabel_riwayat_tindakan', compact([
            'r', 'kode'
        ]));
    }
    public function AmbilRiwayatFarmasi(Request $request)
    {
        $kode = $request->kodekunjungan;
        $r = db::select('SELECT a.id,b.id as id_detail,a.`kode_layanan_header`,b.`total_tarif`,b.jumlah_layanan,b.grantotal_layanan,c.`NAMA_TARIF`,a.status_layanan,b.status_layanan_detail FROM ts_layanan_header a
        LEFT OUTER JOIN ts_layanan_detail b ON a.`id` = b.`row_id_header`
        LEFT OUTER JOIN mt_tarif_header c ON b.`kode_tarif_detail` = c.`KODE_TARIF_HEADER` where a.kode_kunjungan = ? and a.catatan = ?', [$kode, 'FARMASI']);
        return view('Pelayanan.tabel_riwayat_farmasi', compact([
            'r', 'kode'
        ]));
    }
    public function retursatulayanan(Request $request)
    {
        $id_detail = $request->kode;
        $ts_layanan_detail = DB::select('select * from ts_layanan_detail where id = ?', [$id_detail]);
        $ts_layanan_header = DB::select('select * from ts_layanan_header where id = ?', [$ts_layanan_detail[0]->row_id_header]);
        $cek_layanan_header = DB::select('select * from ts_layanan_header where kode_kunjungan = ? and status_layanan != ?', [$ts_layanan_header[0]->kode_kunjungan, 8]);
        if ($ts_layanan_header[0]->status_layanan == 2) {
            $data = [
                'kode' => 500,
                'message' => 'Gagal Retur, Layanan Sudah dibayar !'
            ];
            echo json_encode($data);
            die;
        } else {
            if ($ts_layanan_detail[0]->status_layanan_detail == 8) {
                $data = [
                    'kode' => 500,
                    'message' => 'Layanan sudah diretur !'
                ];
                echo json_encode($data);
                die;
            }
            $data_retur = [
                'jumlah_retur' => 1,
                'total_layanan' => 0,
                'grantotal_layanan' => 0,
                'tagihan_pribadi' => 0,
                'status_layanan_detail' => 8,
            ];
            $total_layanan = $ts_layanan_header[0]->total_layanan;
            $total_layanan_detail = $ts_layanan_detail[0]->grantotal_layanan;
            $total_layanan_baru = $total_layanan - $total_layanan_detail;
            if ($total_layanan_baru <= 0) {
                $status_layanan = 8;
                $status_retur = 'CLS';
            } else {
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

            if (count($cek_layanan_header) > 0) {
                $cek = 0;
                foreach($cek_layanan_header as $ck){
                    if($ck->status_layanan == 1){
                        $cek++;
                    }
                }
                if($cek > 1){
                    $status_kj = 3;
                }else{
                    $status_kj = 4;
                }
            } else {
                $status_kj = 2;
            }


            $ts_kunjungan = [
                'status_kunjungan' => $status_kj
            ];
            ts_kunjungan::where('kode_kunjungan', $ts_layanan_header[0]->kode_kunjungan)
                ->update($ts_kunjungan);
            $data = [
                'kode' => 200,
                'message' => 'Data berhasil disimpan'
            ];
            echo json_encode($data);
        }
    }
    public function retursatulayanan_far(Request $request)
    {
        $id_detail = $request->kode;
        $ts_layanan_detail = DB::select('select * from ts_layanan_detail where id = ?', [$id_detail]);
        $ts_layanan_header = DB::select('select * from ts_layanan_header where id = ?', [$ts_layanan_detail[0]->row_id_header]);
        $cek_layanan_header = DB::select('select * from ts_layanan_header where kode_kunjungan = ? and status_layanan != ?', [$ts_layanan_header[0]->kode_kunjungan, '8']);

        if ($ts_layanan_header[0]->status_layanan == 2) {
            $data = [
                'kode' => 500,
                'message' => 'Gagal Retur, Layanan Sudah dibayar !'
            ];
            echo json_encode($data);
            die;
        } else {
            if ($ts_layanan_detail[0]->status_layanan_detail == 8) {
                $data = [
                    'kode' => 500,
                    'message' => 'Layanan sudah diretur !'
                ];
                echo json_encode($data);
                die;
            }

            $data_retur = [
                'jumlah_retur' => $ts_layanan_detail[0]->jumlah_layanan,
                'total_layanan' => 0,
                'grantotal_layanan' => 0,
                'tagihan_pribadi' => 0,
                'status_layanan_detail' => 8,
            ];
            $cek_ts_layanan_detail = DB::select('select * from ts_layanan_detail where row_id_header = ? and status_layanan_detail = ?', [$ts_layanan_header[0]->id, 1]);
            $total_layanan = $ts_layanan_header[0]->total_layanan;
            $total_layanan_detail = $ts_layanan_detail[0]->grantotal_layanan;
            $total_layanan_baru = $total_layanan - $total_layanan_detail;
            if (count($cek_ts_layanan_detail) <= 0) {
                $status_layanan = 8;
                $status_retur = 'CLS';
            } else {
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
            $tarif_header = DB::Select('select * from mt_tarif_header where KODE_TARIF_HEADER = ?', [$ts_layanan_detail[0]->kode_tarif_detail]);
            $mt_barang = DB::select('select * from mt_barang where id_tarif_header = ?', [$tarif_header[0]->idx]);
            $cek_ti_kartu_stok = db::select('SELECT * FROM ti_kartu_stok WHERE NO = ( SELECT MAX(a.no ) AS nomor FROM ti_kartu_stok a WHERE kode_barang = ?)', [$mt_barang[0]->kode_barang]);
            $ti_kartu_stok = [
                'no_dokumen' => $ts_layanan_detail[0]->id_layanan_detail,
                'tgl_stok' => $this->get_now(),
                'kode_unit' => '4002',
                'kode_barang' => $mt_barang[0]->kode_barang,
                'stok_last' => $cek_ti_kartu_stok[0]->stok_current,
                'stok_in' => $ts_layanan_detail[0]->jumlah_layanan,
                'stok_current' => $cek_ti_kartu_stok[0]->stok_current + $ts_layanan_detail[0]->jumlah_layanan,
                'harga_beli' => $cek_ti_kartu_stok[0]->harga_beli,
                'input_by' => auth()->user()->id,
                'harga_beli_history' =>  $cek_ti_kartu_stok[0]->harga_beli_history,
            ];
            ti_kartu_stok::create($ti_kartu_stok);
            //update tarif detail
            $data_tr_detail = [
                'STOK_CURRENT' => $cek_ti_kartu_stok[0]->stok_current + $ts_layanan_detail[0]->jumlah_layanan
            ];
            Tarif_detail::where('KODE_TARIF_HEADER', $tarif_header[0]->KODE_TARIF_HEADER)->where('KELAS_TARIF', 3)->update($data_tr_detail);
            $cek_log_sediaan = DB::select('select * from log_persediaan where id_detail = ?', [$ts_layanan_detail[0]->id]);
            foreach ($cek_log_sediaan as $c) {
                $stok_out = $c->stok_out;
                if ($stok_out < 0) {
                    $stok_out = $stok_out * -1;
                }
                $sediaan = db::select('select * from ti_stok_pesediaan where id =? ', [$c->id_sediaan]);
                $stok = $sediaan[0]->stok;
                $stok_current = $stok + $stok_out;
                $data_stok_sediaan = [
                    'stok' => $stok_current
                ];
                mt_sediaan::where('id', $c->id_sediaan)->update($data_stok_sediaan);
            }

            if (count($cek_layanan_header) > 0) {
                $cek = 0;
                foreach($cek_layanan_header as $ck){
                    if($ck->status_layanan == 1){
                        $cek++;
                    }
                }
                if($cek > 1){
                    $status_kj = 3;
                }else{
                    $status_kj = 4;
                }
            } else {
                $status_kj = 2;
            }


            $ts_kunjungan = [
                'status_kunjungan' => $status_kj
            ];
            ts_kunjungan::where('kode_kunjungan', $ts_layanan_header[0]->kode_kunjungan)
                ->update($ts_kunjungan);
            $data = [
                'kode' => 200,
                'message' => 'Data berhasil disimpan'
            ];
            echo json_encode($data);
        }
    }
}
