@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Karyawan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Master Karyawan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-success" data-toggle="modal" data-target="#addkary"><i
                    class="bi bi-person-fill-add mr-2"></i> Karyawan</button>
            <div class="v_master_pegawai">

            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="addkary" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form_add_kary">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namakary" name="namakary"
                                placeholder="Masukan nama lengkap ditambah gelar jika ada ... ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SIP</label>
                            <input type="text" class="form-control" id="sip" name="sip"
                                aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Diisi jika dokter ...</small>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Unit</label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($unit as $u)
                                    <option value="{{ $u->kode_unit }}">{{ $u->nama_unit }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpankary()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            get_master_kary()
        })

        function get_master_kary() {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_master_kary') ?>',
                success: function(response) {
                    $('.v_master_pegawai').html(response);
                }
            });
        }

        function simpankary() {
            var data = $('.form_add_kary').serializeArray();
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
                url: '<?= route('simpankary') ?>',
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
                        get_master_kary()
                    }
                }
            });
        }
    </script>
@endsection
