@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kasir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kasir</li>
                    </ol>
                </div>
            </div>
            <form class="form-inline mb-3">
                <div class="form-group mx-sm-2 mb-2">
                    <label for="inputPassword2" class="sr-only">nomorrm</label>
                    <input type="date" class="form-control" id="tanggalawal" placeholder="Tanggal awal" value="{{ $now }}">
                </div>
                <div class="form-group mx-sm-2 mb-2">
                    <label for="inputPassword2" class="sr-only">ktp</label>
                    <input type="date" class="form-control" id="tanggalakhir" placeholder="Tanggal akhir" value="{{ $now }}">
                </div>
                <button type="button" class="btn btn-primary mb-2" onclick="get_antrian_kasir()"><i
                        class="bi bi-search mr-2"></i>Cari Pasien</button>
            </form>
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
    <script>
        $(document).ready(function() {
            get_antrian_kasir()
        })
        function get_antrian_kasir()
        {
            tglawal = $('#tanggalawal').val()
            tglakhir = $('#tanggalakhir').val()
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    tglawal,tglakhir
                },
                url: '<?= route('ambil_antrian_kasir') ?>',
                success: function(response) {
                    $('.v_tabel_antrian_kasir').html(response);
                    // $('#daftarpxumum').attr('disabled', true);
                }
            });
        }
    </script>
@endsection
