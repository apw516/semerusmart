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
