@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pendaftaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pendaftaran</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-success" data-toggle="modal" data-target="#modalpasienbaru"><i
                    class="bi bi-person-plus-fill"></i> Pasien Baru</button>
            <div class="row mt-4">
                <div class="col-md-6">
                    <form class="form-inline mb-3">
                        <div class="form-group mx-sm-2 mb-2">
                            <label for="inputPassword2" class="sr-only">Password</label>
                            <input type="text" class="form-control" id="" placeholder="Nomor RM">
                        </div>
                        <div class="form-group mx-sm-2 mb-2">
                            <label for="inputPassword2" class="sr-only">Password</label>
                            <input type="text" class="form-control" id="inputPassword2" placeholder="Nomor KTP">
                        </div>
                        <div class="form-group mx-sm-2 mb-2">
                            <label for="inputPassword2" class="sr-only">Password</label>
                            <input type="text" class="form-control" id="inputPassword2" placeholder="Nama Pasien">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2"><i class="bi bi-search mr-2"></i>Pasien</button>
                    </form>
                    <div class="v_tabel_pasien">

                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Data Antrian Pasien</h5>
                    <table id="tabelantrian" class="table table-sm table-bordered table-hover">
                        <thead class="bg-warning">
                            <th>Nomor Antrian</th>
                            <th>Nomor RM</th>
                            <th>Nama Pasien</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <tr class="panggilantrian">
                                <td>A1</td>
                                <td>123</td>
                                <td>DAMAR LINTANG</td>
                                <td>Dalam antrian</td>
                            </tr>
                            <tr class="panggilantrian">
                                <td>A2</td>
                                <td>123</td>
                                <td>DAMAR LINTANG</td>
                                <td>Dalam antrian</td>
                            </tr>
                            <tr class="panggilantrian">
                                <td>A3</td>
                                <td>123</td>
                                <td>DAMAR LINTANG</td>
                                <td>Dalam antrian</td>
                            </tr>
                            <tr class="panggilantrian">
                                <td>A4</td>
                                <td>123</td>
                                <td>DAMAR LINTANG</td>
                                <td>Dalam antrian</td>
                            </tr>
                            <tr class="panggilantrian">
                                <td>A5</td>
                                <td>123</td>
                                <td>DAMAR LINTANG</td>
                                <td>Dalam antrian</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <H5>Riwayat Pendaftaran</H5>
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputPassword2" class="sr-only">Password</label>
                            <input type="date" class="form-control" id="inputPassword2" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2"><i class="bi bi-search mr-1"></i>Riwayat
                            Pendaftaran</button>
                    </form>
                    <table id="tabelriwayatpendaftaran" class="table table-sm table-bordered table-hover mt-3">
                        <thead class="bg-dark">
                            <th>Tgl Masuk</th>
                            <th>Nomor RM</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Status Kunjungan</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="modalpasienbaru" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="staticBackdropLabel"> <i class="bi bi-person-plus-fill mr-1"></i> Pasien
                        Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-pasien-baru">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIK</label>
                                    <input type="email" class="form-control" id="nik" name="nik"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Asuransi</label>
                                    <input type="email" class="form-control" id="nomorasuransi" name="nomorasuransi"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Pasien</label>
                                    <input type="email" class="form-control" id="namapx" name="namapx"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Agama</label>
                                    <select class="form-control" id="agama" name="agama">
                                        @foreach ($agama as $a)
                                            <option value="{{ $a->ID }}">{{ $a->agama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status Perkawinan</label>
                                    <select class="form-control" id="statusperkawinan" name="statusperkawinan">
                                        @foreach ($status_perkawinan as $sk)
                                            <option value="{{ $sk->ID }}">{{ $sk->status_kawin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pendidikan</label>
                                    <select class="form-control" id="pendidikan" name="pendidikan">
                                        @foreach ($pendidikan as $p)
                                            <option value="{{ $p->ID }}">{{ $p->pendidikan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pekerjaan</label>
                                    <select class="form-control" id="pekerjaan" name="pekerjaan">
                                        @foreach ($pekerjaan as $pj)
                                            <option value="{{ $pj->ID }}">{{ $pj->pekerjaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" name="provinsi"
                                        aria-describedby="emailHelp">
                                    <input hidden type="text" class="form-control" id="kodeprovinsi"
                                        name="kodeprovinsi" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kabupaten</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                                        aria-describedby="emailHelp">
                                    <input hidden type="text" class="form-control" id="kodekabupaten"
                                        name="kodekabupaten" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                        aria-describedby="emailHelp">
                                    <input hidden type="text" class="form-control" id="kodekecamatan"
                                        name="kodekecamatan" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Desa</label>
                                    <input type="text" class="form-control" id="desa" name="desa"
                                        aria-describedby="emailHelp">
                                    <input hidden type="text" class="form-control" id="kodedesa" name="kodedesa"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="bi bi-x mr-1"></i>Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanpasienbaru()"><i
                            class="bi bi-save mr-1"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalpendaftaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-building-add mr-2"></i>Pendaftaran
                        Pelayanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            get_data_pasien()
        })
        $(function() {
            $('#tabelpasien').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $(function() {
            $('#tabelantrian').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $(function() {
            $('#tabelriwayatpendaftaran').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $('#tabelantrian').on('click', '.panggilantrian', function() {
            Swal.fire({
                title: 'Berhasil Panggil Antrian ?',
                text: "Nomor Antrian A1",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Berhasil'
            }).then((result) => {
                if (result.isConfirmed) {

                }
            })

        })

        function get_data_pasien() {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_data_pasien') ?>',
                success: function(response) {
                    $('.v_tabel_pasien').html(response);
                    // $('#daftarpxumum').attr('disabled', true);
                }
            });
        }
        $(document).ready(function() {
            $('#provinsi').autocomplete({
                source: function(request, response) {
                    $.getJSON("<?= route('cariprovinsi') ?>", {
                            prov: $('#provinsi').val()
                        },
                        response);
                },
                select: function(event, ui) {
                    $('[id="provinsi"]').val(ui.item.label);
                    $('[id="kodeprovinsi"]').val(ui.item.kode);
                }
            });
        });
        $(document).ready(function() {
            $('#kabupaten').autocomplete({
                source: function(request, response) {
                    $.getJSON("<?= route('carikabupaten') ?>", {
                            kab: $('#kabupaten').val(),
                            prov : $('#kodeprovinsi').val()
                        },
                        response);
                },
                select: function(event, ui) {
                    $('[id="kabupaten"]').val(ui.item.label);
                    $('[id="kodekabupaten"]').val(ui.item.kode);
                }
            });
        });
        $(document).ready(function() {
            $('#kecamatan').autocomplete({
                source: function(request, response) {
                    $.getJSON("<?= route('carikecamatan') ?>", {
                            kec: $('#kecamatan').val(),
                            kab : $('#kodekabupaten').val()
                        },
                        response);
                },
                select: function(event, ui) {
                    $('[id="kecamatan"]').val(ui.item.label);
                    $('[id="kodekecamatan"]').val(ui.item.kode);
                }
            });
        });
        $(document).ready(function() {
            $('#desa').autocomplete({
                source: function(request, response) {
                    $.getJSON("<?= route('caridesa') ?>", {
                            des: $('#desa').val(),
                            kec : $('#kodekecamatan').val()
                        },
                        response);
                },
                select: function(event, ui) {
                    $('[id="desa"]').val(ui.item.label);
                    $('[id="kodedesa"]').val(ui.item.kode);
                }
            });
        });

        function simpanpasienbaru() {
            var data = $('.form-pasien-baru').serializeArray();
            $.ajax({
                async: true,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    data: JSON.stringify(data),
                },
                url: '<?= route('simpanpasienbaru') ?>',
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops....',
                        text: 'Sepertinya ada masalah......',
                        footer: ''
                    })
                },
                success: function(data) {
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
    </script>
@endsection
