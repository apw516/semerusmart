@extends('templates.main')
@section('container')


<div class="row" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#pasien" data-toggle="tab">Data Pasien</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pegawai" data-toggle="tab">Data Pegawai</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user" data-toggle="tab">Data User</a></li>
                    <li class="nav-item"><a class="nav-link" href="#diagnosa" data-toggle="tab">Data Diagnosa</a></li>

                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="pasien">
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
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="pegawai">
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
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="user">
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
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="diagnosa">
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
                                <table id="datapasien" class="table  table-sm text-sm table-bordered table-hover">
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
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
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
    $(function() {
        $("#datapegawai").DataTable({
            "responsive": false,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });
    $(function() {
        $("#datauser").DataTable({
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
    $('#formtambahdokter').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('isi')
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
    $('#formtambahuser').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('isi')
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
    $('#formtambahdiagnosa').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('isi')
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });
</script>

@endsection