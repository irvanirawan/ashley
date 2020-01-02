<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashley Login</title>
    <link rel="icon" href="{{asset('image/ashleyfav.png')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
    body {
    font-family: "Lato", sans-serif;
    background-image:url("{{asset('image/ashley-banner.jpg')}}");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    line-height:2.5;
}

html {
    height: 100%
}

.main-head{
    height: 150px;
    background: #FFF;

}

.sidenav {
    height: 100%;
    background-color: #e08585d9;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }

    .image-logo{
        width: 150px;
    }

    .login-main-text{
        margin-top: 0px!important;
        padding: 0px!important;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%;
    }

    .image-logo{
        width: 400px;
    }
    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}
    </style>
</head>
<body>
        <div class="sidenav">
                <div class="login-main-text">
                   {{-- <h2>Application<br> Login Page</h2>
                   <p>Login or register from here to access.</p> --}}
                   <img src="/image/ashley.png" alt="ashley" class="image-logo">
                </div>
             </div>
             <div class="main">
                <div class="col-md-6 col-sm-12" style="background-color: #f2f4f4bd;border-radius: 20px;padding-bottom: 0px;">
                   <div class="login-form">
                      <form method="POST" action="{{ route('ashley.login.post') }}">
                        @csrf
                         <div class="form-group" style="margin-bottom: 0px;">
                            <label style="margin-bottom: 0px;">Telp</label>
                            {{-- <input type="text" class="form-control" placeholder="User Name"> --}}
                            <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp" autofocus>
                            @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label style="margin-bottom: 0px;">Password</label>
                            {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         <button type="submit" class="btn btn-black">Login</button>
                           <p style="text-align: center">Belum Punya Akun ? <a href="{{route('ashley.register')}}">Register.</a></p>
                         {{-- <button type="submit" class="btn btn-secondary">Register</button> --}}
                      </form>
                   </div>
                </div>
             </div>
             @if($errors->any())
             <h4>{{$errors->first()}}</h4>
             @endif

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
@if($errors->any())
alert('{{$errors->first()}}')
@endif
</script>
</body>
</html>
