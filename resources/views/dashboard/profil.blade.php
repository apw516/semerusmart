@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-danger card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('public/adminlte/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ auth()->user()->nama }}</h3>

                            <p class="text-muted text-center">userame : {{ auth()->user()->username }}</p>
                            <form action="{{ route('gantipassword') }}" method="post">
                                @csrf
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a
                                            class="float-right text-dark text-bold">{{ auth()->user()->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Unit</b> <a class="float-right">{{ auth()->user()->unit }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Klinik</b> <a class="float-right"></a>
                                    </li>
                                    <li class="list-group-item bg-danger">
                                        <b>Ganti Password</b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Password Lama</b> <input type="password" class="form-control" name="passwordlama"
                                            id="passwordlama" value="">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Password Baru</b> <input type="password" class="form-control"
                                            name="passwordbaru1" id="passwordbaru1">
                                    </li>
                                    <li class="list-group-item">
                                        <b>Konfirmasi Password Baru</b> <input type="password" class="form-control"
                                            name="passwordbaru2" id="passwordbaru2">
                                    </li>
                                    @if(session()->has('loginError'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('loginError')}}
                                    </div>
                                @endif
                                    @error('passwordlama')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('passwordbaru1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </ul>
                                <button type="submit" class="btn btn-primary btn-block"><b>Update</b></button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
