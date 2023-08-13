@extends('templates.main')
@section('container')

<div class="card-body">
    <div class="row" style="align-content: 10px;">
        <h4 class="col-md-2">Data Diagnosa Klinik</h4>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formtambahdiagnosa">Tambah Pasien</button>
        <div class="modal  col-md-12" id="formtambahdiagnosa" aria-labelledby="formtambahdiagnosaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formtambahdiagnosaLabel">Daftarkan Diagnosa Baru </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nama Diagnosa</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputName" placeholder="nama diagnosa">
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
                    <th>No</th>
                    <th>Nama Diagnosa</th>
                    <th>Keterangan</th>
                    <th style="width: 15%;">action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Anemia</td>
                        <td>Solusi Anemia</td>
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
                        <td>2</td>
                        <td>DM</td>
                        <td>Solusi DM</td>
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
                        <td>3</td>
                        <td>Vertigo</td>
                        <td>32</td>
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
                        <td>4</td>
                        <td>Demam</td>
                        <td>Solusi Demam</td>
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
                        <td>5</td>
                        <td>Flue</td>
                        <td>Solusi Flue</td>
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

    $('#formtambahdiagnosa').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('isi')
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
</script>
@endsection