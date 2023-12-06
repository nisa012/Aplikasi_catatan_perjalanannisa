@extends('layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>login-nisa</title>

    </head>
    <body>
    <main class="form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center" style="background-color: #BA94D1; color: #fff;">Login</h3>
                    @if(\Session::has('message'))
                        <div class="alert alert-info">
                            {{\Session::get('message')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('postlogin') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="NIK" id="nik" class="form-control" name="nik"
                                    autofocus>
                                @if ($errors->has('nik'))
                                <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                              <button type="submit" style="background-color: #BA94D1;">Masuk</button>
                              <button type="submit" style="background-color: #BA94D1;"><a href="signup" style="color: black; text-decoration: none;">Saya Pengguna Baru</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
@endsection
<style>
    body {
        background-image: url('{{ asset('img/background.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>






