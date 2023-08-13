@extends('templates.main')
@section('container')

<div class="card-body">
    <div class="row" style="align-content: 10px;">
        <h4 class="col-md-2">Data Pegawai Klinik</h4>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formtambahdokter">Tambah Pegawai</button>
        <div class="modal  col-md-12" id="formtambahdokter" aria-labelledby="formtambahdokterLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formtambahdokterLabel">Daftarkan Pasien Baru </h5>
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
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Nama Pegawai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Usia</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Usia">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="inputExperience" placeholder="alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">No. HP</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="No. HP">
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
    <div class="row center" style="align-content:center; margin-top:15px">
        <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="Nama Pegawai">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="NIP">
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
    <div class="row" style="align-content: center; margin-top: 20px">
        <div class="col-md-12">
            <table id="datapegawai" class=" table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            NIP
                        </th>
                        <th style="width: 20%">
                            Nama Pegawai
                        </th>
                        <th style="width: 30%">
                            Jabatan
                        </th>
                        <th>
                            Alamat
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            6789098
                        </td>
                        <td>
                            David Bayu

                        </td>
                        <td>
                            CEO
                        </td>
                        <td class="project_progress">
                            jln. Raya Pakusamben Wetan no. 075
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6789099
                        </td>
                        <td>
                            Adinda Thomas

                        </td>
                        <td>
                            Manager Klinik
                        </td>
                        <td class="project_progress">
                            jln. Raya Kudukeras Wetan no. 001
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6789080
                        </td>
                        <td>
                            jihan Utami
                        </td>
                        <td>
                            Admin
                        </td>
                        <td class="project_progress">
                            jln. Raya Babakan Wetan no. 001
                        </td>
                        <td class="project-state">
                            <span class="badge badge-danger">Tidak Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6789010
                        </td>
                        <td>
                            Adji santoso Utama
                        </td>
                        <td>
                            Perawat
                        </td>
                        <td class="project_progress">
                            jln. Raya Babakan Gebang no. 021
                        </td>
                        <td class="project-state">
                            <span class="badge badge-danger">Tidak Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6789129
                        </td>
                        <td>
                            Rizqi Febriansyah
                        </td>
                        <td>
                            Dokter Kelamin
                        </td>
                        <td class="project_progress">
                            jln. Raya Babakan no. 005
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Aktif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
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
        $("#datapegawai").DataTable({
            "responsive": false,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });

    $('#formtambahdokter').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('isi')
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
</script>
@endsection