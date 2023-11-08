@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Tarif Pelayanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Master Tarif Pelayanan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-success" data-toggle="modal" data-target="#modaladd_tarif"><i
                    class="bi bi-file-earmark-plus-fill mr-1"></i> Tarif Pelayanan</button>
            <div class="v_master_tarif">

            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modaladd_tarif" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tindakan / Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-header-tarif">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Tindakan / Layanan</label>
                                    <input type="text" class="form-control" id="nama_tindakan" name="nama_tindakan"
                                        placeholder="Masukan nama tarif / layanan ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Kelompok Tarif</label>
                                    <select class="form-control" id="kelompok_tarif" name="kelompok_tarif">
                                        <option value="0">Silahkan Pilih</option>
                                        @foreach ($kelompok as $k)
                                            <option value="{{ $k->kelompok_tarif_id }}">{{ $k->kelompok_tarif_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success add_detail"><i class="bi bi-folder-plus"></i> Detail Tarif Tindakan /
                                Layanan </button>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <form action="" method="post" class="form_detail_tindakan">
                                        <div class="input_fields_wrap_detail">
                                            <div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpan_tarif_baru()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            get_master_tarif()
        })

        function get_master_tarif() {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_master_tarif') ?>',
                success: function(response) {
                    $('.v_master_tarif').html(response);
                }
            });
        }
        $(".add_detail").on('click', function(event) {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap_detail"); //Fields wrapper
            var x = 1; //initlal text box count
            // e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    '<div class="form-row text-xs"> <div class="form-group col-md-2"><label for="exampleFormControlSelect1">Pilih Kelas Tarif</label><select class="form-control" id="kelastarif" name="kelastarif"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div><div class="form-group col-md-4"><label for="exampleFormControlInput1">Tarif / Harga </label><input type="text" class="form-control" id="tarifnya" name="tarifnya" placeholder="Masukan Harga ..."></div><i class="bi bi-x-square remove_field form-group col-md-2 text-danger" kode2="' +
                    x + '"></i></div>'
                );
                $(wrapper).on("click", ".remove_field", function(e) { //user click on remove
                    kodedetail = $(this).attr('kode2')
                    $('#' + kodedetail).removeAttr('status', true)
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            }
        });

        function simpan_tarif_baru() {
            var data_1 = $('.form-header-tarif').serializeArray();
            var data_2 = $('.form_detail_tindakan').serializeArray();
            spinner = $('#loader2');
            spinner.show();
            $.ajax({
                async: true,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    data1: JSON.stringify(data_1),
                    data2: JSON.stringify(data_2),
                },
                url: '<?= route('simpan_tarif') ?>',
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
                        location.reload()
                    }
                }
            });
        }
    </script>
@endsection
