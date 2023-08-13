@extends('templates.main')
@section('container')

<div class="card-body">
    <div class="row" style="align-content: 10px;">
        <h4 class="col-md-2">Data Tarif Klinik</h4>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formtambahtarif">Tambah Tarif</button>
        <div class="modal  col-md-12" id="formtambahtarif" aria-labelledby="formtambahtarifLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formtambahtarifLabel">Daftarkan Tarif Baru </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nama Tarif</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputName" placeholder="nama tarif">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="harga">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="keterangan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class=" col-sm-12">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row " style="align-content: center; margin-top:20px">
        <div class="col-md-12">
            <table id="datadiagnosa" class="table  table-sm text-sm table-bordered table-hover">
                <thead class="bg-light">
                    <th>Nama Tarif</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th style="width: 15%;">action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Injeksi</td>
                        <td>Rp. 100.000</td>
                        <td>injeksi antibiotik</td>
                        <td class="center">

                            <a class=" btn btn-info btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a>
                            |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Sunat</td>
                        <td>Rp. 150.000</td>
                        <td>sudah dengan paket obat</td>
                        <td class="center">


                            <a class=" btn btn-info btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a> |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Pemeriksaan Dokter</td>
                        <td>Rp. 100.000</td>
                        <td>Pemeriksaan yang biasa dilakukan</td>
                        <td class="center">


                            <a class=" btn btn-info btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a> |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>USG</td>
                        <td>Rp. 150.000</td>
                        <td>cek perut</td>
                        <td class="center">


                            <a class=" btn btn-info btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a> |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                    <td>gula darah</td>
                        <td>Rp. 20.000</td>
                        <td>cek gula darah</td>
                        <td class="center">


                            <a class=" btn btn-info btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a> |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>

                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#datadiagnosa").DataTable({
            "responsive": false,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });

    $('#formtambahtarif').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('isi')
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
</script>
@endsection