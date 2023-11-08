@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Distributor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Master Distributor</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-success" data-toggle="modal" data-target="#modaladd_dist"><i
                    class="bi bi-file-earmark-plus-fill mr-1"></i> Master Distributor</button>
            <div class="v_master_dist">

            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modaladd_dist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Master Distributor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form_tambah_dist">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Distributor</label>
                            <input type="text" class="form-control" id="namadist" name="namadist"
                                placeholder="Masukan nama distributor ..." value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="simpandistbaru()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            get_master_dist()
        })

        function get_master_dist() {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_master_dist') ?>',
                success: function(response) {
                    $('.v_master_dist').html(response);
                }
            });
        }

        function simpandistbaru() {
            var data = $('.form_tambah_dist').serializeArray();
            spinner = $('#loader2');
            spinner.show();
            $.ajax({
                async: true,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    data: JSON.stringify(data),
                },
                url: '<?= route('simpandistributorbaru') ?>',
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops....',
                        text: 'Sepertinya ada masalah......',
                        footer: ''
                    })
                    spinner.hide();
                },
                success: function(data) {
                    spinner.hide();
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
                        get_master_dist()
                    }
                }
            });
        }
    </script>
@endsection
