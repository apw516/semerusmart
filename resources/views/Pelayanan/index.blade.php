@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">E-RM Pasien</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">E-RM Pasien</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <H5>Antrian Pasien</H5>
                    <table id="tabelantrian" class="table table-sm table-bordered table-hover">
                        <thead class="bg-info">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                        </thead>
                    </table>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                {{-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> --}}
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                            <button class="btn btn-info mt-3"><i class="bi bi-journal-plus mr-2"></i>Catatan
                                                Medis Pasien</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="inputAddress2">Keluhan Utama</label>
                                    <textarea type="text" class="form-control" id="inputAddress2"
                                        placeholder=""></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tekanan Darah</label>
                                        <input type="text" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Suhu Tubuh</label>
                                        <input type="text" class="form-control" id="inputPassword4">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Hasil Pemeriksaan</label>
                                    <textarea type="text" class="form-control" id="inputAddress2"
                                        placeholder=""></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <table id="tabeltindakan" class="table table-sm table-bordered table-hover">
                                            <thead>
                                                <th>Nama Tindakan / Obat</th>
                                                <th>Tarif</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-right"><i class="bi bi-save mr-1"></i>Simpan</button>
                                <button type="submit" class="btn btn-danger float-right mr-2"><i class="bi bi-x mr-1"></i>Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
           $(function() {
            $('#tabelantrian').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $(function() {
            $('#tabeltindakan').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
