@extends('templates.main')
@section('container')

<div class="card-body">
    <div class="row" style="align-content: 10px;">
        <h4 class="col-md-2">Data Pasien Klinik</h4>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formtambahpasien">Tambah Pasien</button>
        <div class="modal  col-md-12" id="formtambahpasien" aria-labelledby="formtambahpasienLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formtambahpasienLabel">Daftarkan Pasien Baru </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputName" placeholder="NIK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">NAMA</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Nama Pasien">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Usia</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Usia Pasien">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="inputExperience" placeholder="Alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">No.Hp</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="No.Hp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class=" col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
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
    <div class="row center" style="align-content:center; margin-top: 10px">
        <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="Nama pasien">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="No RM">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="Alamat">
        </div>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="tanggal_kunjungan" autocomplete="off" data-language="en" data-date-format="yyyy-mm-dd" placeholder="Tanggal">
        </div>

        <div>
            <button type="submit" class="btn btn-primary" onclick="lihatpasienex()"> <i class="bi bi-search-heart"></i> </button>
        </div>
    </div>
    <div class="row " style="align-content: center; margin-top:20px">
        <div class="col-md-12">
            <table id="datapasien" class="table  table-sm text-sm table-bordered table-hover">
                <thead class="bg-light">
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>Usia</th>
                    <th>Alamat</th>
                    <th>action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>50609080</td>
                        <td>Abdul Gofur</td>
                        <td>32</td>
                        <td>Jl. raya babakan no 05 RT 01 RW 02</td>
                        <td class="center">

                            <a class=" btn btn-warning btn-sm " href="#">
                                <i class="fas  fa-eye"></i>
                            </a> |
                            <a class=" btn btn-danger btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a>
                            |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>50609080</td>
                        <td>Abdul Gofur</td>
                        <td>32</td>
                        <td>Jl. raya babakan no 05 RT 01 RW 02</td>
                        <td class="center">

                            <a class=" btn btn-warning btn-sm " href="#">
                                <i class="fas  fa-eye"></i>
                            </a> |
                            <a class=" btn btn-danger btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a> |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>50609081</td>
                        <td>Ghifari hernandes</td>
                        <td>32</td>
                        <td>Jl. raya babakan no 05 RT 01 RW 02 kecamatan babakan kabupaten cirebon</td>
                        <td class="center">

                            <a class=" btn btn-warning btn-sm " href="#">
                                <i class="fas  fa-eye"></i>
                            </a> |
                            <a class=" btn btn-danger btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a> |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>50609083</td>
                        <td>muhammad jaidi al kahfiru</td>
                        <td>32</td>
                        <td>Jl. raya bekasi timur no 05 RT 01 RW 02 kec bekasi kabupaten bekasi</td>
                        <td class="center">

                            <a class=" btn btn-warning btn-sm " href="#">
                                <i class="fas  fa-eye"></i>
                            </a> |
                            <a class=" btn btn-danger btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a> |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>50609089</td>
                        <td>subhi</td>
                        <td>67</td>
                        <td>Jl. raya kalipasung no 05 RT 01 RW 02</td>
                        <td class="center">

                            <a class=" btn btn-warning btn-sm " href="#">
                                <i class="fas  fa-eye"></i>
                            </a> |
                            <a class=" btn btn-danger btn-sm " href="#">
                                <i class="fas  fa-pen"></i>
                            </a> |
                            <a class=" btn btn-secondary btn-sm " href="#">
                                <i class="fas  fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>50609123</td>
                        <td>Abdul Gofur</td>
                        <td>32</td>
                        <td>Jl. raya kudu keras no 05 RT 01 RW 02</td>
                        <td class="center">

                            <a class=" btn btn-warning btn-sm " href="#">
                                <i class="fas  fa-eye"></i>
                            </a> |
                            <a class=" btn btn-danger btn-sm " href="#">
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
    document.getElementById('tanggal_kunjungan').valueAsDate = new Date()
    $(function() {
        $("#datapasien").DataTable({
            "responsive": false,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });

    $('#formtambahpasien').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('isi')
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
</script>

@endsection
