@extends('layout')
@section('content')
<main class="signup-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center" style="background-color: #BA94D1; color: #fff;">Register User</h3>
                    <div class="card-body">
                        <form action="{{ route('postsignup') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="NIK" id="nik" class="form-control" name="nik" autofocus>
                                @if ($errors->has('nik'))
                                <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nama" id="name" class="form-control" name="name" autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button type="submit" style="background-color: #BA94D1;">Daftar</button>
                            <button type="submit" style="background-color: #BA94D1;"><a href="login" style="color: black; text-decoration: none;">Login</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
<style>
    body {
        background-image: url('{{ asset('img/background.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
