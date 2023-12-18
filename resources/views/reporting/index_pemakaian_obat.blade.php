@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pemakaian Obat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pemakaian Obat</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="v_tabel_antrian_kasir">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail_bayar">

                    </div>
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
                    <input type="date" class="form-control" id="tanggalawal" placeholder="Password"
                        value="{{ $now }}">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Password</label>
                    <input type="date" class="form-control" id="tanggalakhir" placeholder="Password"
                        value="{{ $now }}">
                </div>
                <button type="button" class="btn btn-primary mb-2" onclick="tampilriwayat_pemakaian_obat()"><i
                        class="bi bi-search mr-1"></i>Riwayat
                    Pemakaian Obat</button>
            </form>
            <div class="VRP">

            </div>
        </div>
        <script>
            $(document).ready(function() {
                tampilriwayat_pemakaian_obat()
            })

            function tampilriwayat_pemakaian_obat() {
                tglawal = $('#tanggalawal').val()
                tglakhir = $('#tanggalakhir').val()
                $.ajax({
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        tglawal,
                        tglakhir
                    },
                    url: '<?= route('riwayatpemakaian_obat') ?>',
                    success: function(response) {
                        $('.VRP').html(response);
                        // $('#daftarpxumum').attr('disabled', true);
                    }
                })
            }
        </script>
</section @endsection
