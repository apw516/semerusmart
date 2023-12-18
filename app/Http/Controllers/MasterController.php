<?php

namespace App\Http\Controllers;

use App\Models\mt_barang;
use App\Models\mt_distributor;
use App\Models\mt_paramedis;
use App\Models\mt_sediaan;
use App\Models\User;
use App\Models\Tarif_detail;
use App\Models\Tarif_header;
use App\Models\ti_kartu_stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    public function simpaneditkary(Request $request)
    {
        $data = json_decode($_POST['data'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        // $kode_par = $this->get_kode_paramedis();
        $datapar = [
            // 'kode_paramedis' => $kode_par,
            'nama_paramedis' => $dataSet['namakary'],
            'unit' => $dataSet['unit'],
            'sip_dr' => $dataSet['sip'],
        ];
        mt_paramedis::where('ID', $dataSet['idkary'])
            ->update($datapar);
        // mt_paramedis::create($datapar);
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
    public function ambil_master_barang()
    {
        $bar = DB::select('select *,a.id as id_barang from mt_barang a left outer join mt_distributor b on a.id_distributor = b.id');
        $dist = DB::select('select * from mt_distributor');
        return view('adminmaster.tabel_barang', compact([
            'bar',
            'dist'
        ]));
    }
    public function ambil_master_dist()
    {
        $dist = DB::select('select * from mt_distributor');
        return view('adminmaster.tabel_dist', compact([
            'dist'
        ]));
    }
    public function detailuser(Request $request)
    {
        $user = DB::select('select * from mt_user where id =?', [$request->id]);
        $unit = DB::select('select * from mt_unit');
        $hak_ = DB::select('select * from mt_hak_akses');
        return view('adminmaster.detailuser', compact([
            'user',
            'unit',
            'hak_'
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
            'username' => $dataSet['username'],
            'nama' => $dataSet['namauser'],
            'hak_akses' => $dataSet['hakakses'],
            'unit' => $dataSet['unit'],
            'kode_paramedis' => $dataSet['kodeparamedis'],
            'is_activated' => $dataSet['status'],
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
        $kelompok = DB::select('select * from mt_tarif_kelompok where kelompok_tarif_id < 4');
        return view('adminmaster.tarif', compact([
            'menu',
            'kelompok'
        ]));
    }
    public function barang()
    {
        $menu = 'BARANG';
        $kelompok = DB::select('select * from mt_tarif_kelompok');
        $dist = DB::select('select * from mt_distributor');
        return view('adminmaster.barang', compact([
            'menu',
            'kelompok',
            'dist'
        ]));
    }
    public function stokfarmasi()
    {
        $menu = 'STOK FARMASI';
        $now = $this->get_date();
        return view('adminmaster.stokfarmasi', compact([
            'menu',
            'now'
        ]));
    }
    public function ambil_kartu_Stok(Request $request)
    {
        $stok = DB::SELECT('SELECT e.`tgl_stok`,e.kode_barang,f.`nama_barang`, stok_last,stok_in,stok_out,stok_current
        FROM ti_kartu_stok e
        LEFT OUTER JOIN mt_barang f ON e.`kode_barang` = f.`kode_barang`
        WHERE NO = (SELECT MAX(NO) FROM ti_kartu_stok WHERE kode_barang = e.kode_barang)
        AND date(e.`tgl_stok`) BETWEEN ? AND ?',[$request->tanggalawal,$request->tanggalakhir]);
        return view('adminmaster.tabelstok',compact([
            'stok'
        ]));
    }
    public function distributor()
    {
        $menu = 'DISTRIBUTOR';
        $kelompok = DB::select('select * from mt_tarif_kelompok');
        return view('adminmaster.distributor', compact([
            'menu',
            'kelompok'
        ]));
    }
    public function simpan_tarif(Request $request)
    {
        $data1 = json_decode($_POST['data1'], true);
        $data2 = json_decode($_POST['data2'], true);
        foreach ($data1 as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $header[$index] = $value;
        }
        if (count($data2) > 0) {
            foreach ($data2 as $d) {
                $index = $d['name'];
                $value = $d['value'];
                $dataSet[$index] = $value;
                if ($index == 'tarifnya') {
                    $detail[] = $dataSet;
                }
            }
            $kode_header = $this->get_kode_tarif_header();
            $data_header = [
                'KODE_TARIF_HEADER' => $kode_header,
                'NAMA_TARIF' => $header['nama_tindakan'],
                'KELOMPOK_TARIF_ID' =>  $header['kelompok_tarif'],
                'eklaim_group' => '11',
                'TGL_INPUT' => $this->get_now(),
                'status' => '1',
                'user_input_id' => auth()->user()->id,
            ];
            $mt_tarif_header = Tarif_header::create($data_header);
            if ($header['kelompok_tarif'] > 3) {
                $mt_barang = [
                    'kode_tipe' => 1,
                    'kode_barang' => $this->get_kode_barang(),
                    'nama_barang' =>  $header['nama_tindakan'],
                    'kelompok_tarif_id' => $header['kelompok_tarif'],
                    'id_tarif_header' => $mt_tarif_header->id
                ];
                mt_barang::create($mt_barang);
            }
            foreach ($detail as $d) {
                $data_detail = [
                    'KODE_TARIF_DETAIL' => $kode_header . $d['kelastarif'],
                    'KODE_TARIF_HEADER' => $kode_header,
                    'KELAS_TARIF' => $d['kelastarif'],
                    'TOTAL_TARIF_CURRENT' => $d['tarifnya'],
                    'INPUT_DATE' => $this->get_now(),
                ];
                Tarif_detail::create($data_detail);
            }
            $data = [
                'kode' => 200,
                'message' => 'Tarif berhasil disimpan !'
            ];
            echo json_encode($data);
        } else {
            $data = [
                'kode' => 500,
                'message' => 'Detail harus diisi !'
            ];
            echo json_encode($data);
        }
    }
    public function detail_barang(Request $request)
    {
        $barang = DB::select('select * from mt_barang where id = ?', [$request->id]);
        $dist = DB::select('select * from mt_distributor');
        return view('adminmaster.detailbarang', compact([
            'barang',
            'dist'
        ]));
    }
    public function editbarang(Request $request)
    {
        $barang = DB::select('select * from mt_barang where id = ?', [$request->id]);
        $dist = DB::select('select * from mt_distributor');
        return view('adminmaster.editbarang', compact([
            'barang',
            'dist'
        ]));
    }
    public function detail_stok(Request $request)
    {
        $barang = DB::select('select * from mt_barang a left outer join mt_distributor b on a.id_distributor = b.id where a.id = ?', [$request->id]);
        $stok = db::select('SELECT * FROM ti_kartu_stok WHERE kode_barang = ?  AND no IN (SELECT MAX(no) FROM ti_kartu_stok where kode_barang = ?)', [$barang[0]->kode_barang, $barang[0]->kode_barang]);
        $sediaan = DB::select('select * from ti_stok_pesediaan where kode_barang = ?', [$barang[0]->kode_barang]);
        return view('adminmaster.detailstok', compact([
            'barang',
            'stok',
            'sediaan'
        ]));
    }
    public function simpandetailbarang(Request $request)
    {
        $data2 = json_decode($_POST['data'], true);
        foreach ($data2 as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $header[$index] = $value;
        }
        $mt_barang = DB::select('select * from mt_barang where id = ?', [$header['id']]);
        $isi_1 = 0;
        $isi_2 = 0;
        $isi_3 = 0;
        if ($header['isi_satuan_besar'] > 0) {
            $j1 = $header['isi_satuan_besar'] * $mt_barang[0]->isi_satuan_sedang;
            $isi_1 = $j1 * $mt_barang[0]->isi_satuan_kecil;
        }
        if ($header['isi_satuan_sedang'] > 0) {
            $isi_2 = $header['isi_satuan_sedang'] * $mt_barang[0]->isi_satuan_kecil;
        }
        if ($header['isi_satuan_kecil'] > 0) {
            $isi_3 = $header['isi_satuan_kecil'];
        }
        $stok_in = $isi_1 + $isi_2 + $isi_3;
        $data_detail = [
            // 'isi_satuan_besar' => $header['isi_satuan_besar'],
            // 'isi_satuan_sedang' => $header['isi_satuan_sedang'],
            // 'isi_satuan_kecil' => $header['isi_satuan_kecil'],
            // 'stok' => $mt_barang[0]->stok + $stok_in,
            'harga_jual' => $header['hargajual'],
            'harga_beli' => $header['hargabeli'],
            'aturan_pakai' => $header['aturanpakai'],
            'ed' => $header['ed'],
            'last_update' => $this->get_now()
            // 'paket' => $header['paket'],
        ];
        mt_barang::where('id', $header['id'])
            ->update($data_detail);
        if (empty($header['ceklisan'])) {
            $simpanstok = 0;
        } else {
            $simpanstok = 1;
        };
        if ($simpanstok == 1) {
            // $cek_ti_kartu_stok = DB::select('select * from ti_kartu_stok where kode_barang = ?',[$header['kodebarang']]);
            $mt_tarif_header = DB::select('select * from mt_tarif_header where idx = ?', [$mt_barang[0]->id_tarif_header]);
            // $mt_tarif_detail = DB::select('select * from mt_tarif_detail where KODE_TARIF_HEADER = ? AND KELAS_TARIF = ?',[$mt_tarif_header[0]->KODE_TARIF_HEADER,'3']);
            //update master tarif detail dengan kelas 3 disertai dengan harga jual di ts_layanan_detail denga harga jual terbaru
            $cek_ti_kartu_stok = db::select('SELECT * FROM ti_kartu_stok WHERE NO = ( SELECT MAX(a.no ) AS nomor FROM ti_kartu_stok a WHERE kode_barang = ?)', [$header['kodebarang']]);
            if (count($cek_ti_kartu_stok) == 0) {
                $stok_last = 0;
                $stok_current =  $stok_in;
                $harga_beli_history = 0;
            } else {
                $stok_last = $cek_ti_kartu_stok[0]->stok_current;
                $stok_current = $stok_last +  $stok_in;
                $harga_beli_history = $cek_ti_kartu_stok[0]->harga_beli;
            }
            $ti_kartu_stok = [
                'no_dokumen' => $this->get_kode_master_barang(),
                'tgl_stok' => $this->get_now(),
                'kode_unit' => '4002',
                'kode_barang' => $header['kodebarang'],
                'stok_last' => $stok_last,
                'stok_in' => $stok_in,
                'stok_current' => $stok_current,
                'harga_beli' => $header['hargabeli'],
                'input_by' => auth()->user()->id,
                'harga_beli_history' => $harga_beli_history,
            ];
            $data_detail_tarif = [
                'TOTAL_TARIF_CURRENT' => $header['hargajual'],
                'STOK_CURRENT' => $stok_current
            ];
            Tarif_detail::where('KODE_TARIF_HEADER', $mt_tarif_header[0]->KODE_TARIF_HEADER)
                ->update($data_detail_tarif);
            ti_kartu_stok::create($ti_kartu_stok);

            //cek tabel sediaan
            $cek_sediaan = DB::select('select * from ti_stok_pesediaan where kode_barang = ? and ed = ? and distributor_id = ?', [$header['kodebarang'], $header['ed'], $header['distributor']]);
            if (count($cek_sediaan) > 0) {
                $data_sediaan = [
                    'stok' => $stok_current,
                    'last_update' => $this->get_now(),
                ];
                mt_sediaan::where('id', $cek_sediaan[0]->id)->update($data_sediaan);
            } else {
                $data_sediaan = [
                    'kode_barang' => $header['kodebarang'],
                    'stok' =>  $stok_in,
                    'kode_unit' => '4002',
                    'ed' => $header['ed'],
                    'distributor_id' => $header['distributor'],
                    'tgl_entry' => $this->get_now(),
                ];
                mt_sediaan::create($data_sediaan);
            }
        }
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan !'
        ];
        echo json_encode($data);
    }
    public function simpandistributorbaru(Request $request)
    {
        $data2 = json_decode($_POST['data'], true);
        foreach ($data2 as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $header[$index] = $value;
        }
        $datadist = [
            'nama_distributor' => strtoupper($header['namadist']),
            'tgl_entry' => $this->get_now()
        ];
        mt_distributor::create($datadist);
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan !'
        ];
        echo json_encode($data);
    }
    public function simpanbarangbaru(Request $request)
    {
        $data2 = json_decode($_POST['data'], true);
        foreach ($data2 as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $header[$index] = $value;
        }
        $kode_barang =  $this->get_kode_barang();
        $data_barang = [
            'kode_barang' => $kode_barang,
            'nama_barang' => strtoupper($header['namabarang']),
            'dosis' => $header['dosis'],
            'satuan_besar' => $header['satuanbesar'],
            'isi_satuan_besar' => $header['rasiobesar'],
            'satuan_sedang' => $header['satuansedang'],
            'isi_satuan_sedang' => $header['rasiosedang'],
            'satuan_kecil' => $header['satuankecil'],
            'isi_satuan_kecil' => $header['rasiokecil'],
            'tgl_input' => $this->get_now(),
            'id_distributor' => $header['distributor'],
        ];
        $BRG = mt_barang::create($data_barang);
        $kode_header = $this->get_kode_tarif_header();
        $data_header = [
            'KODE_TARIF_HEADER' => $kode_header,
            'NAMA_TARIF' => strtoupper($header['namabarang']),
            'KELOMPOK_TARIF_ID' => 4,
            'eklaim_group' => '11',
            'TGL_INPUT' => $this->get_now(),
            'status' => '1',
            'user_input_id' => auth()->user()->id,
        ];
        $mt_tarif_header = Tarif_header::create($data_header);
        $data_detail = [
            'KODE_TARIF_DETAIL' => $kode_header . 3,
            'KODE_TARIF_HEADER' => $kode_header,
            'KELAS_TARIF' => 3,
            'INPUT_DATE' => $this->get_now(),
        ];
        Tarif_detail::create($data_detail);
        mt_barang::where('id', $BRG['id'])
            ->update(['id_tarif_header' => $mt_tarif_header->id]);
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan !'
        ];
        echo json_encode($data);
    }
    public function simpaneditbarang(Request $request)
    {
        $data2 = json_decode($_POST['data'], true);
        foreach ($data2 as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $header[$index] = $value;
        }
        $kode_barang =  $this->get_kode_barang();
        $data_barang = [
            'nama_barang' => strtoupper($header['namabarang']),
            'dosis' => $header['dosis'],
            'satuan_besar' => $header['satuanbesar'],
            'isi_satuan_besar' => $header['rasiobesar'],
            'satuan_sedang' => $header['satuansedang'],
            'isi_satuan_sedang' => $header['rasiosedang'],
            'satuan_kecil' => $header['satuankecil'],
            'isi_satuan_kecil' => $header['rasiokecil'],
            'tgl_input' => $this->get_now(),
            'id_distributor' => $header['distributor'],
        ];
        mt_barang::where('id', $header['idbarang'])->update($data_barang);
        $data_header = [
            'NAMA_TARIF' => strtoupper($header['namabarang']),
            'KELOMPOK_TARIF_ID' => 4,
            'eklaim_group' => '11',
            'TGL_INPUT' => $this->get_now(),
            'status' => '1',
            'user_input_id' => auth()->user()->id,
        ];
        Tarif_header::where('idx', $header['idtarif'])
            ->update($data_header);
        $data = [
            'kode' => 200,
            'message' => 'Data berhasil disimpan !'
        ];
        echo json_encode($data);
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
        return 'DOK' . $kd;
    }
    public function get_kode_tarif_header()
    {
        $q = DB::select('SELECT idx,KODE_TARIF_HEADER,RIGHT(KODE_TARIF_HEADER,4) AS kd_max  FROM mt_tarif_header ORDER BY idx DESC
        LIMIT 1');
        $kd = "";
        if (count($q) > 0) {
            foreach ($q as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'TX' . $kd;
    }
    public function get_kode_barang()
    {
        $q = DB::select('SELECT id,kode_barang,RIGHT(kode_barang,6) AS kd_max  FROM mt_barang ORDER BY id DESC
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
        return 'B' . $kd;
    }
    public function get_kode_master_barang()
    {
        $q = DB::select('SELECT a.no,no_dokumen,RIGHT(no_dokumen,6) AS kd_max  FROM ti_kartu_stok a ORDER BY a.no DESC
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
        return 'M' . $kd;
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
    public function ambil_data_karyawan(Request $request)
    {
        $unit = DB::select('select * from mt_unit');
        $mt_paramedis = DB::selecT('select * from mt_paramedis where id = ?',[$request->id]);
        return view('adminmaster.formedit_kary',compact([
            'unit',
            'mt_paramedis'
        ]));
    }
}
