@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Riwayat Pendaftaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Riwayat Pendaftaran</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Password</label>
                    <input type="date" class="form-control" id="tanggalawal" placeholder="Password" value="{{ $now }}">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Password</label>
                    <input type="date" class="form-control" id="tanggalakhir" placeholder="Password" value="{{ $now }}">
                </div>
                <button type="button" class="btn btn-primary mb-2" onclick="tampilriwayat_daftar()"><i class="bi bi-search mr-1"></i>Riwayat
                    Pendaftaran</button>
            </form>
            <div class="VRP">

            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            tanggalawal = $('#tanggalawal').val()
            tanggalakhir = $('#tanggalakhir').val()
            get_riwayat_daftar(tanggalawal,tanggalakhir)
        })
        function tampilriwayat_daftar()
        {
            tanggalawal = $('#tanggalawal').val()
            tanggalakhir = $('#tanggalakhir').val()
            get_riwayat_daftar(tanggalawal,tanggalakhir)
        }
        function get_riwayat_daftar(tanggalawal,tanggalakhir) {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    tanggalawal,tanggalakhir
                },
                url: '<?= route('ambil_riwayat_daftar') ?>',
                success: function(response) {
                    $('.VRP').html(response);
                    // $('#daftarpxumum').attr('disabled', true);
                }
            });
        }
    </script>
@endsection
