@extends('templates.main')
@section('container')
<div class="row" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#pasien" data-toggle="tab">Data Pasien</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user" data-toggle="tab">Data User</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pegawai" data-toggle="tab">Data Pegawai</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="pasien">
                        <h4>Data Pasien Klinik</h4>
                        <div class="row center" style="align-content:center">
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
                                    <thead class="bg-info">
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
                    <div class="tab-pane" id="user">
                        <div class="row center" style="align-content:center">
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
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Data User</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped projects">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">
                                                #
                                            </th>
                                            <th style="width: 20%">
                                                Project Name
                                            </th>
                                            <th style="width: 30%">
                                                Team Members
                                            </th>
                                            <th>
                                                Project Progress
                                            </th>
                                            <th style="width: 8%" class="text-center">
                                                Status
                                            </th>
                                            <th style="width: 20%">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                                    </div>
                                                </div>
                                                <small>
                                                    57% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100" style="width: 47%">
                                                    </div>
                                                </div>
                                                <small>
                                                    47% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                                    </div>
                                                </div>
                                                <small>
                                                    77% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    </div>
                                                </div>
                                                <small>
                                                    60% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar5.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%">
                                                    </div>
                                                </div>
                                                <small>
                                                    12% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                                                    </div>
                                                </div>
                                                <small>
                                                    35% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar5.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                                    </div>
                                                </div>
                                                <small>
                                                    87% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                                    </div>
                                                </div>
                                                <small>
                                                    77% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                                                #
                                            </td>
                                            <td>
                                                <a>
                                                    AdminLTE v3
                                                </a>
                                                <br>
                                                <small>
                                                    Created 01.01.2019
                                                </small>
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar5.png">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                                    </div>
                                                </div>
                                                <small>
                                                    77% Complete
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span class="badge badge-success">Success</span>
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
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="pegawai">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
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
</script>
@endsection