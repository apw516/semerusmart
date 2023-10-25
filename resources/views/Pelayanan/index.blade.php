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
                    <div class="v_a_p">

                    </div>
                    {{-- <table id="tabelantrian" class="table table-sm table-bordered table-hover">
                        <thead class="bg-info">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                        </thead>
                    </table> --}}
                </div>
                <div class="col-md-9">
                    <div class="form-ermnya">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        //    $(function() {
        //     $('#tabelantrian').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });
        // });
        // $(function() {
        //     $('#tabeltindakan').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": true,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });
        // });
        $(document).ready(function() {
            get_antrian_erm()
        })
        function get_antrian_erm() {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_antrian_erm') ?>',
                success: function(response) {
                    $('.v_a_p').html(response);
                }
            });
        }
    </script>
@endsection
