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
    background-image:url("https://lh3.googleusercontent.com/p/AF1QipO3cGKw0i2LSGB_q-5TL7dbN3S0Z3SDqRmjDyUQ=s1600-h380");
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
@media screen and (min-width: 800px) {
    .login-form{
        margin-top: 180px;
    }
    .img{
        width: 400px;
    }
}
@media all and (min-width:0px) and (max-width: 769px) {
  .img{
    width: 250px;
  }
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
                    <form method="POST" action="{{ route('ashley.register.post') }}">
                        @csrf
                         <div class="form-group" style="margin-bottom: 0px;">
                            <label style="margin-bottom: 0px;">Name</label>
                            {{-- <input type="text" class="form-control" placeholder="User Name"> --}}
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </div>
                         <div class="form-group">
                            <label style="margin-bottom: 0px;">Telp</label>
                            {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                            <input id="telp" type="telp" class="form-control" name="telp" value="{{ old('telp') }}" required autocomplete="telp">
                            @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </div>
                         <div class="form-group">
                            <label style="margin-bottom: 0px;">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </div>
                         <div class="form-group">
                            <label style="margin-bottom: 0px;">Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                         </div>
                         {{-- <button type="submit" class="btn btn-black">Login</button> --}}
                         <button type="submit" class="btn btn-secondary">Register</button>
                           <p style="text-align: center">Sudah Punya Akun ? <a href="{{route('ashley.login')}}">Login.</a></p>
                      </form>
                   </div>
                </div>
             </div>


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    @if($errors->any())
    alert('{{$errors->first()}}')
    @endif
    </script>
</body>
</html>
