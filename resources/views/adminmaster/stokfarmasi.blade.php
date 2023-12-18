@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kartu Stok Farmasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kartu Stok Farmasi</li>
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
                <button type="button" class="btn btn-primary mb-2" onclick="tampilkartu_stok()"><i class="bi bi-search mr-1"></i>Stok Farmasi</button>
            </form>
            <div class="VRP">

            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            tanggalawal = $('#tanggalawal').val()
            tanggalakhir = $('#tanggalakhir').val()
            ambilkartustok(tanggalawal,tanggalakhir)
        })
        function tampilkartu_stok()
        {
            tanggalawal = $('#tanggalawal').val()
            tanggalakhir = $('#tanggalakhir').val()
            ambilkartustok(tanggalawal,tanggalakhir)
        }
        function ambilkartustok(tanggalawal,tanggalakhir)
        {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    tanggalawal,tanggalakhir
                },
                url: '<?= route('ambil_kartu_Stok') ?>',
                success: function(response) {
                    $('.VRP').html(response);
                    // $('#daftarpxumum').attr('disabled', true);
                }
            });
        }
    </script>
@endsection
