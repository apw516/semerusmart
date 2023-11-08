@extends('auth.main')
@section('container')
    <div class="login_wrapper">
        <div class="animate form login_form">
            <h4 class="text-dark text-center" style="margin-bottom:25px" style="font-weight: 50px;"><img width="10%" class="mr-2"src="{{ asset('adminlte/dist/img/LOGOX.svg')}}" alt="">SEMERUSMART</h4>
            <!-- start form for validation -->
            <div class="x_panel rcorners1 solid">
                <form id="demo-form" action="{{ route('/login')}}" method="post" data-parsley-validate>
                    @csrf
                    <h5 class="text-dark mb-4 text-center mt-2 text-bold" style="font-weight: bold;">MASUK</h5>
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success')}}
                        </div>
                    @endif
                    @if(session()->has('loginError'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('loginError')}}
                        </div>
                    @endif
                    <label for="fullname" class="text-dark">Email</label>
                    @error('email')  <p class="text-danger">{{ $message }}</p> @enderror
                    <input type="email" id="email" class="form-control rcorners1 @error('email') is-invalid @enderror" name="email" required autofocus value="{{ old('email')}}"  />
                    <label for="password" class="text-dark text-bold mt-2">Password</label>
                    <input type="password" id="password" class="form-control rcorners1 " name="password"
                        data-parsley-trigger="change" required />
                        <button style="background-color:rgb(240, 235, 230)"
                            class="btn mt-2 form-control rcorners1 mb-3">Masuk</button>
                </form>
                <p class="text-center text-dark text-bold">Belum punya akun ? <a href="{{ route('register')}}">Daftar</a></p>
            </div>
        </div>
    </div>
@endsection
