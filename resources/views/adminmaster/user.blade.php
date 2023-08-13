@extends('templates.main')
@section('container')
<div class="card-body">
    <div class="row" style="align-content: 10px;">
        <h4 class="col-md-2">Data User Klinik</h4>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formtambahuser">Tambah User</button>
        <div class="modal  col-md-12" id="formtambahuser" aria-labelledby="formtambahuserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formtambahuserLabel">Daftarkan User Baru </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-12 col-form-label">Nama</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputName" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-12 col-form-label">Username</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-12 col-form-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="inputName2" placeholder="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">

                                    <label>JABATAN</label>
                                    <select class="form-control ">
                                        <option>Admin</option>
                                        <option>Dokter</option>
                                        <option>Perawat</option>
                                        <option>CEO</option>
                                        <option>Manager</option>
                                    </select>
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
    <div class="row" style="align-content: center; margin-top: 20px">
        <div class="col-md-12">
            <table id="datauser" class=" table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 20%">
                            NAMA
                        </th>
                        <th style="width: 20%">
                            USERNAME
                        </th>
                        <th style="width: 30%">
                            JABATAN
                        </th>
                        <th>
                            KODE PARAMEDIS
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 1%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            David Bayu
                        </td>
                        <td>
                            dbay01

                        </td>
                        <td>
                            CEO
                        </td>
                        <td class="project_progress">
                            KLC001
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pen">
                                </i>
                                Edit
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Adinda Thomas
                        </td>
                        <td>
                            addth

                        </td>
                        <td>
                            Manager Klinik
                        </td>
                        <td class="project_progress">
                            KLM002
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pen">
                                </i>
                                Edit
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            jihan Utami
                        </td>
                        <td>
                            jhn03
                        </td>
                        <td>
                            Admin
                        </td>
                        <td class="project_progress">
                            KLA123
                        </td>
                        <td class="project-state">
                            <span class="badge badge-danger">Tidak Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pen">
                                </i>
                                Edit
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Adji santoso Utama

                        </td>
                        <td>
                            adj01
                        </td>
                        <td>
                            Perawat
                        </td>
                        <td class="project_progress">
                            KLP001
                        </td>
                        <td class="project-state">
                            <span class="badge badge-danger">Tidak Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pen">
                                </i>
                                Edit
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Rizqi Febriansyah
                        </td>
                        <td>
                            rizfeb02
                        </td>
                        <td>
                            Dokter Kelamin
                        </td>
                        <td class="project_progress">
                            KLD001
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pen">
                                </i>
                                Edit
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
        $("#datauser").DataTable({
            "responsive": false,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });

    $('#formtambahuser').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('isi')
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
</script>
@endsection