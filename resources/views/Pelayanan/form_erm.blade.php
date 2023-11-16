<div class=" ml-2 mr-3 card">
    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm"
                            src="{{ asset('public/adminlte/dist/img/user1-128x128.jpg') }}" alt="user image">
                        <span class="username">
                            <a href="#" class="text-dark text-bold">{{ $mt_pasien[0]->nama_px }}</a>
                            {{-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> --}}
                        </span>
                        <span class="description text-lg text-dark">Nomor RM : {{ $mt_pasien[0]->no_rm }} | Antrian :
                            {{ $datakunjungan[0]->kode_registrasi }}</span>
                        <button class="btn btn-info mt-3 btncatatanmedis" nomorrm="{{ $mt_pasien[0]->no_rm }}"
                            data-toggle="modal" data-target="#modalcatatanmedis"><i
                                class="bi bi-journal-plus mr-2"></i>Catatan
                            Medis Pasien</button>
                    </div>
                </div>
            </div>
        </div>
        @php $ttv = explode('|',$datakunjungan[0]->tanda_vital ) @endphp
        <form action="post" class="form_assesment">
            <div class="form-group">
                <label for="inputAddress2">Keluhan Utama</label>
                <textarea type="text" class="form-control" id="keluhanutama" name="keluhanutama" placeholder="">{{ $datakunjungan[0]->keluhanutama }}</textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Tekanan Darah</label>
                    <input type="text" class="form-control" id="tekanandarah" name="tekanandarah"
                        value="{{ $ttv[0] }}">
                    <input hidden type="text" class="form-control" id="kodekunjungan" name="kodekunjungan"
                        value="{{ $datakunjungan[0]->kode_kunjungan }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Suhu Tubuh</label>
                    <input type="text" class="form-control" id="suhutubuh" name="suhutubuh"
                        value="{{ $ttv[1] }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Diagnosa</label>
                <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder=""
                    value="@if ($cs > 0) {{ $assesment[0]->diagnosa }} @endif">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Hasil Pemeriksaan</label>
                <textarea type="text" class="form-control" id="hasilpemeriksaan" name="hasilpemeriksaan" placeholder="">@if ($cs > 0){{ $assesment[0]->hasilpemeriksaan }}@endif</textarea>
            </div>
        </form>
        <div class="accordion" id="accordionExample1">
            <div class="card">
                <div class="card-header bg-info" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn text-light text-bold btn-block text-left" type="button"
                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            Pilih Tindakan
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header bg-dark">Pilih Tindakan</div>
                                    <div class="card-body">
                                        <table id="tabeltindakan" class="table table-sm table-bordered table-hover">
                                            <thead class="bg-info">
                                                <th>Nama Tindakan</th>
                                                <th>Tarif</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($tarif as $t)
                                                    <tr class="pilihlayanan" namatindakan ="{{ $t->NAMA_TARIF }}"
                                                        tarif ="{{ $t->TOTAL_TARIF_CURRENT }}"
                                                        kodetarifheader="{{ $t->KODE_TARIF_HEADER }}"
                                                        kodetarifdetail="{{ $t->KODE_TARIF_DETAIL }}"
                                                        id="{{ $t->KODE_TARIF_DETAIL }}">
                                                        <td>{{ $t->NAMA_TARIF }}</td>
                                                        <td>IDR {{ number_format($t->TOTAL_TARIF_CURRENT, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-dark">Riwayat Tindakan Hari ini</div>
                                            <div class="card-body">
                                                <div class="v_r_tindakan">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-warning">Tindakan Yang Dipilih ...</div>
                                            <div class="card-body">
                                                <form action="" method="post" class="formtindakan">
                                                    <div class="input_fields_wrap">
                                                        <div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-info" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn text-light btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            Pilih Obat
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <table id="tableobat" class="table table-sm table-bordered table-hover">
                                    <thead class="bg-info">
                                        <th>Nama Obat</th>
                                        <th>Tarif</th>
                                        <th>Stok</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($obat as $t)
                                            <tr class="pilihlayanan" namatindakan ="{{ $t->NAMA_TARIF }}"
                                                tarif ="{{ $t->TOTAL_TARIF_CURRENT }}"
                                                kodetarifheader="{{ $t->KODE_TARIF_HEADER }}"
                                                kodetarifdetail="{{ $t->KODE_TARIF_DETAIL }}"
                                                id="{{ $t->KODE_TARIF_DETAIL }}">
                                                <td>{{ $t->NAMA_TARIF }}</td>
                                                <td>IDR {{ number_format($t->TOTAL_TARIF_CURRENT, 2) }}</td>
                                                <td>{{ $t->STOK_CURRENT }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-dark">Riwayat Pilih Obat hari ini</div>
                                            <div class="card-body">
                                                <div class="v_r_obat">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-warning">Obat Yang Dipilih ...</div>
                                            <div class="card-body">
                                                <form action="" method="post" class="formorderobat">
                                                    <div class="input_fields_wrap_obat">
                                                        <div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-info" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn text-light btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                            Order Laboratorium
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordionExample1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header bg-dark">Pilih Layanan Laboratorium</div>
                                    <div class="card-body">
                                        <table id="tabelorderlab" class="table table-sm table-bordered table-hover">
                                            <thead class="bg-info">
                                                <th>Nama Layanan</th>
                                                <th>Tarif</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($tarif_lab as $t)
                                                    <tr class="pilihlayanan" namatindakan ="{{ $t->NAMA_TARIF }}"
                                                        tarif ="{{ $t->TOTAL_TARIF_CURRENT }}"
                                                        kodetarifheader="{{ $t->KODE_TARIF_HEADER }}"
                                                        kodetarifdetail="{{ $t->KODE_TARIF_DETAIL }}"
                                                        id="{{ $t->KODE_TARIF_DETAIL }}">
                                                        <td>{{ $t->NAMA_TARIF }}</td>
                                                        <td>IDR {{ number_format($t->TOTAL_TARIF_CURRENT, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-dark">Riwayat Order Laboratorium Hari ini</div>
                                            <div class="card-body">
                                                <div class="v_r_layanan_lab">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-warning">Layanan Yang Dipilih ...</div>
                                            <div class="card-body">
                                                <form action="" method="post" class="formorderlab">
                                                    <div class="input_fields_wrap_lab">
                                                        <div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success float-right" onclick="simpanassesment()"><i
                class="bi bi-save mr-1"></i>Simpan</button>
        <button type="button" class="btn btn-danger float-right mr-2"><i class="bi bi-x mr-1"></i>Batal</button>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalcatatanmedis" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Catatan Medis {{ $mt_pasien[0]->nama_px }} |
                    {{ $mt_pasien[0]->no_rm }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (count($cm) > 0)
                    @foreach ($cm as $c)
                        @php $ttv = explode('|',$datakunjungan[0]->tanda_vital ) @endphp
                        <div class="accordion" id="accordionExample3">
                            <div class="card">
                                <div class="card-header bg-info" id="headingOne{{ $c->kode_kunjungan }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left text-bold " type="button"
                                            data-toggle="collapse" data-target="#collapse{{ $c->kode_kunjungan }}"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            {{ $c->tgl_masuk }} | {{ $c->kode_paramedis }} | Diagnosa :
                                            {{ $c->diagnosa }}
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse{{ $c->kode_kunjungan }}" class="collapse"
                                    aria-labelledby="headingOne{{ $c->kode_kunjungan }}"
                                    data-parent="#accordionExample3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputAddress2">Keluhan Utama</label>
                                            <textarea readonly type="text" class="form-control" id="keluhanutama" name="keluhanutama" placeholder="">{{ $c->keluhanutama }}</textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Tekanan Darah</label>
                                                <input readonly type="text" class="form-control" id="tekanandarah"
                                                    name="tekanandarah" value="{{ $ttv[0] }}">
                                                <input hidden type="text" class="form-control" id="kodekunjungan"
                                                    name="kodekunjungan" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Suhu Tubuh</label>
                                                <input readonly type="text" class="form-control" id="suhutubuh"
                                                    name="suhutubuh" value="{{ $ttv[1] }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">Diagnosa</label>
                                            <input readonly type="text" class="form-control" id="diagnosa"
                                                name="diagnosa" placeholder="" value="{{ $c->diagnosa }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">Hasil Pemeriksaan</label>
                                            <textarea readonly type="text" class="form-control" id="hasilpemeriksaan" name="hasilpemeriksaan"
                                                placeholder="">{{ $c->hasilpemeriksaan }}</textarea>
                                        </div>
                                        <div class="card">
                                            <div class="card-header bg-danger">Tindakan & Obat</div>
                                            <div class="card-body">
                                                <table class="table table-sm table-bordered table-hover">
                                                    <thead>
                                                        <th>Nama Tarif</th>
                                                        <th>Keterangan</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rto as $rt )
                                                        @if($rt->kode_kunjungan == $c->kodekunjungan)
                                                            <tr>
                                                                <td>{{ $rt->NAMA_TARIF}}</td>
                                                                <td>{{ $rt->catatan}}</td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    Data tidak ditemukan !
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        kodekunjungan = $('#kodekunjungan').val()
        ambil_riwayat_tindakan(kodekunjungan)
        ambil_riwayat_farmasi(kodekunjungan)
    })
    $(function() {
        $('#tabeltindakan').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 4
        });
    });
    $(function() {
        $('#tabelorderlab').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 4
        });
    });
    $(function() {
        $('#tableobat').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 4
        });
    });
    $('#tabeltindakan').on('click', '.pilihlayanan', function() {
        if ($(this).attr('status') == 1) {
            Swal.fire({
                icon: 'error',
                title: 'Layanan sudah dipilih !',
                text: 'Silahkan isi jumlah layanan jika layanan lebih dari 1 ...',
                footer: ''
            })
        } else {
            $(this).attr("status", "1");
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var x = 1; //initlal text box count
            namatindakan = $(this).attr('namatindakan')
            tarif = $(this).attr('tarif')
            kodeheader = $(this).attr('kodetarifheader')
            kodedetail = $(this).attr('kodetarifdetail')
            // e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    '<div class="form-row text-xs"><div class="form-group col-md-5"><label for="">Tindakan</label><input readonly type="" class="form-control form-control-sm" id="" name="namatindakan" value="' +
                    namatindakan +
                    '"><input hidden readonly type="" class="form-control form-control-sm" id="" name="kodelayanan" value="' +
                    kodedetail +
                    '"><input hidden readonly type="" class="form-control form-control-sm" id="" name="kodelayanan" value="' +
                    kodeheader +
                    '"></div><div class="form-group col-md-2"><label for="inputPassword4">Tarif</label><input readonly type="" class="form-control form-control-sm" id="" name="tarif" value="' +
                    tarif +
                    '"></div><div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type="" class="form-control form-control-sm" id="" name="qty" value="1"></div><div class="form-group col-md-1"><label for="inputPassword4">Disc</label><input type="" class="form-control form-control-sm" id="" name="disc" value="0"></div><div class="form-group col-md-1"></div><i class="bi bi-x-square remove_field form-group col-md-2 text-danger" kode2="' +
                    kodedetail + '"></i></div>'
                );
                $(wrapper).on("click", ".remove_field", function(e) { //user click on remove
                    kodedetail = $(this).attr('kode2')
                    $('#' + kodedetail).removeAttr('status', true)
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            }
        }
    });
    $('#tableobat').on('click', '.pilihlayanan', function() {
        if ($(this).attr('status') == 1) {
            Swal.fire({
                icon: 'error',
                title: 'Layanan sudah dipilih !',
                text: 'Silahkan isi jumlah layanan jika layanan lebih dari 1 ...',
                footer: ''
            })
        } else {
            $(this).attr("status", "1");
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap_obat"); //Fields wrapper
            var x = 1; //initlal text box count
            namatindakan = $(this).attr('namatindakan')
            tarif = $(this).attr('tarif')
            kodeheader = $(this).attr('kodetarifheader')
            kodedetail = $(this).attr('kodetarifdetail')
            // e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    '<div class="form-row text-xs"><div class="form-group col-md-3"><label for="inputPassword4">Silahkan Pilih</label> <select class="form-control" id="paket" name="paket"><option value="0">Paket</option><option value="1">Non-Paket</option></select></div><div class="form-group col-md-4"><label for="">Nama obat</label><div class="input-group mb-3"><input readonly type="text" name="namatindakan" value="' +
                    namatindakan +
                    '"class="form-control form-control-sm" aria-label="Text input with checkbox"></div><input hidden readonly type="" class="form-control form-control-sm" id="" name="kodelayanan" value="' +
                    kodedetail +
                    '"><input hidden readonly type="" class="form-control form-control-sm" id="" name="kodelayanan" value="' +
                    kodeheader +
                    '"></div><div class="form-group col-md-2"><label for="inputPassword4">Tarif</label><input readonly type="" class="form-control form-control-sm" id="" name="tarif" value="' +
                    tarif +
                    '"></div><div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type="" class="form-control form-control-sm" id="" name="qty" value="1"></div><div class="form-group col-md-4"><label for="inputPassword4">Aturan Pakai</label><textarea type="" class="form-control form-control-sm" id="" name="aturanpakai" value=""></textarea></div><div class="form-group col-md-1"></div><i class="bi bi-x-square remove_field form-group col-md-1 text-danger" kode2="' +
                    kodedetail + '"></i></div>'
                );
                $(wrapper).on("click", ".remove_field", function(e) { //user click on remove
                    kodedetail = $(this).attr('kode2')
                    $('#' + kodedetail).removeAttr('status', true)
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            }
        }
    });
    $('#tabelorderlab').on('click', '.pilihlayanan', function() {
        if ($(this).attr('status') == 1) {
            Swal.fire({
                icon: 'error',
                title: 'Layanan sudah dipilih !',
                text: 'Silahkan isi jumlah layanan jika layanan lebih dari 1 ...',
                footer: ''
            })
        } else {
            $(this).attr("status", "1");
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap_lab"); //Fields wrapper
            var x = 1; //initlal text box count
            namatindakan = $(this).attr('namatindakan')
            tarif = $(this).attr('tarif')
            kodeheader = $(this).attr('kodetarifheader')
            kodedetail = $(this).attr('kodetarifdetail')
            // e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    '<div class="form-row text-xs"><div class="form-group col-md-5"><label for="">Tindakan</label><input readonly type="" class="form-control form-control-sm" id="" name="namatindakan" value="' +
                    namatindakan +
                    '"><input hidden readonly type="" class="form-control form-control-sm" id="" name="kodelayanan" value="' +
                    kodedetail +
                    '"><input hidden readonly type="" class="form-control form-control-sm" id="" name="kodelayanan" value="' +
                    kodeheader +
                    '"></div><div class="form-group col-md-2"><label for="inputPassword4">Tarif</label><input readonly type="" class="form-control form-control-sm" id="" name="tarif" value="' +
                    tarif +
                    '"></div><div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type="" class="form-control form-control-sm" id="" name="qty" value="1"></div><div class="form-group col-md-1"><label for="inputPassword4">Disc</label><input type="" class="form-control form-control-sm" id="" name="disc" value="0"></div><div class="form-group col-md-1"></div><i class="bi bi-x-square remove_field form-group col-md-2 text-danger" kode2="' +
                    kodedetail + '"></i></div>'
                );
                $(wrapper).on("click", ".remove_field", function(e) { //user click on remove
                    kodedetail = $(this).attr('kode2')
                    $('#' + kodedetail).removeAttr('status', true)
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            }
        }
    });

    function simpanassesment() {
        var data = $('.form_assesment').serializeArray();
        var data_tindakan = $('.formtindakan').serializeArray();
        var data_obat = $('.formorderobat').serializeArray();
        var data_lab = $('.formorderlab').serializeArray();
        spinner = $('#loader2');
        spinner.show();
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                data: JSON.stringify(data),
                data_tindakan: JSON.stringify(data_tindakan),
                data_obat: JSON.stringify(data_obat),
                data_lab: JSON.stringify(data_lab),
            },
            url: '<?= route('simpan_assesment') ?>',
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops....',
                    text: 'Sepertinya ada masalah......',
                    footer: ''
                })
                spinner.hide();
            },
            success: function(data) {
                spinner.hide();
                if (data.kode == 500) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopss...',
                        text: data.message,
                        footer: ''
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: data.message,
                        footer: ''
                    })
                    location.reload()
                }
            }
        });
    }

    function ambil_riwayat_tindakan(kodekunjungan) {
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                kodekunjungan
            },
            url: '<?= route('ambil_riwayat_tindakan') ?>',
            success: function(response) {
                $('.v_r_tindakan').html(response);
            }
        });
    }

    function ambil_riwayat_farmasi(kodekunjungan) {
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                kodekunjungan
            },
            url: '<?= route('ambil_riwayat_farmasi') ?>',
            success: function(response) {
                $('.v_r_obat').html(response);
            }
        });
    }
</script>
