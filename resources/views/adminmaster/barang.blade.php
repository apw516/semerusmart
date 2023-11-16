@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Barang</h1>
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
            <button class="btn btn-success" data-toggle="modal" data-target="#modaladd_barang"><i
                    class="bi bi-file-earmark-plus-fill mr-1"></i> Master Barang</button>
            <div class="v_master_barang">

            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modaladd_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Master Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form_tambah_barang">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Barang</label>
                            <input type="text" class="form-control" id="namabarang" name="namabarang"
                                placeholder="Masukan nama barang ..." value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Satuan Besar</label>
                            <select class="form-control" id="satuanbesar" name="satuanbesar">
                                <option value="">-- Silahkan pilih --</option>
                                <option value="BOX">BOX</option>
                                <option value="BTL">BTL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Rasio Besar</label>
                            <input type="text" class="form-control" id="rasiobesar" name="rasiobesar"
                                placeholder="Masukan rasio besar ..." value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Satuan Sedang</label>
                            <select class="form-control" id="satuansedang" name="satuansedang">
                                <option value="">-- Silahkan pilih --</option>
                                <option value="PCS">PCS</option>
                                <option value="BTL">BTL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Rasio Sedang</label>
                            <input type="text" class="form-control" id="rasiosedang" name="rasiosedang"
                                placeholder="Masukan rasio sedang ..." value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Satuan Kecil</label>
                            <select class="form-control" id="satuankecil" name="satuankecil">
                                <option value="">-- Silahkan pilih --</option>
                                <option value="TAB">TAB</option>
                                <option value="BTL">BTL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Rasio Kecil</label>
                            <input type="text" class="form-control" id="rasiokecil" name="rasiokecil"
                                placeholder="Masukan rasio kecil ..." value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Distributor</label>
                            <select class="form-control" id="distributor" name="distributor">
                                <option value="">-- Silahkan pilih --</option>
                                @foreach ($dist as $d )
                                <option value="{{ $d->id }}">{{ $d->nama_distributor }}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Dosis</label>
                            <input type="text" class="form-control" id="dosis" name="dosis"
                                placeholder="Masukan dosis obat ..." value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Aturan Pakai</label>
                            <textarea class="form-control" id="aturanpakai" name="aturanpakai" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="simpanbarangbaru()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            get_master_barang()
        })

        function get_master_barang() {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_master_barang') ?>',
                success: function(response) {
                    $('.v_master_barang').html(response);
                }
            });
        }

        function simpanbarangbaru() {
            var data = $('.form_tambah_barang').serializeArray();
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
                url: '<?= route('simpanbarangbaru') ?>',
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
                        get_master_barang()
                    }
                }
            });
        }
    </script>
@endsection
