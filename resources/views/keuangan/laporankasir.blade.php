@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Pendapatan Kasir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan Pendapatan Kasir</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                <button type="button" class="btn btn-primary mb-2" onclick="tampilriwayat_kasir()"><i class="bi bi-search mr-1"></i>Laporan Pendapatan Kasir</button>
            </form>
            <div class="VRP">

            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            tanggalawal = $('#tanggalawal').val()
            tanggalakhir = $('#tanggalakhir').val()
            tampillaporan_kasir(tanggalawal,tanggalakhir)
        })
        function tampilriwayat_kasir()
        {
            tanggalawal = $('#tanggalawal').val()
            tanggalakhir = $('#tanggalakhir').val()
            tampillaporan_kasir(tanggalawal,tanggalakhir)
        }
        function tampillaporan_kasir(tanggalawal,tanggalakhir)
        {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    tanggalawal,tanggalakhir
                },
                url: '<?= route('ambil_laporan_kasir') ?>',
                success: function(response) {
                    $('.VRP').html(response);
                    // $('#daftarpxumum').attr('disabled', true);
                }
            });
        }
    </script>
@endsection
