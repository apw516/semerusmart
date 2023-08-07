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
                            <input type="text" class="form-control" id="inputPassword2" placeholder="Nomor RM">
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
                    <table id="tabelpasien" class="table table-sm table-hover table-bordered mt-5">
                        <thead class="bg-secondary">
                            <th>Nomor RM</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </thead>
                        <tbody>
                            <tr class="pilihpasien" data-toggle="modal" data-target="#modalpendaftaran">
                                <td>123</td>
                                <td>1111</td>
                                <td>Nama Pasien 1</td>
                                <td>Pabuaran</td>
                            </tr>
                            <tr data-toggle="modal" data-target="#modalpendaftaran">
                                <td>321</td>
                                <td>1123</td>
                                <td>Nama Pasien 2</td>
                                <td>Ciledug</td>
                            </tr>
                            <tr data-toggle="modal" data-target="#modalpendaftaran">
                                <td>231</td>
                                <td>3123123</td>
                                <td>Nama Pasien 3</td>
                                <td>Babakan</td>
                            </tr>
                        </tbody>
                    </table>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> <i class="bi bi-person-plus-fill mr-1"></i> Pasien
                        Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="bi bi-x mr-1"></i>Close</button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-save mr-1"></i> Simpan</button>
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
    </script>
@endsection
