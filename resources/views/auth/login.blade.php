@extends('layouts.login')
@section('title', 'Iniciar sesión')
@section('content')


<div style="background:#00000057;">
    <div class="limiter">
        <div class="container-login100">
            <div style="padding-top:5em;" class="wrap-login100">
                <div style="padding-top:5em;" class="login100-pic js-tilt " data-tilt>
                    <div class="notificationss bounceInDown">

                    <a href="" id="link"><img src="{{asset('img/sunlogos.png')}}"></a>
                        </br>
                        </br>


                        <!--<img style="width:150px; height:60px;" class="img " src="assets/img/mont.png" alt="IMG">-->

                    </div>
                    <div class="notificationss bounceInDown">


                        <h1 class="mb-4 titleceneae wow fadeInUp">
                            Centro Educativo Natanael
                          </h1>                    </br></br>


                        <!--<img style="width:150px; height:60px;" class="img " src="assets/img/mont.png" alt="IMG">-->

                    </div>
                </div>


                <form style="padding-top:5em;" class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                <span class="login100-form-title">
                        Iniciar sesión
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input id="email" class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Correo Institucional" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input id="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password"  placeholder="Contraseña" required autocomplete="current-password" >
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                                </button>
                    </div>
                    @if (Route::has('password.request'))
                  
                    <a id="register"class="btn btn-link" href="{{ route('inscripcion.index') }}"> ¿No tienes cuenta? registrate aquí</a>
                @endif
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>

                    </div>

                    <div class="text-center p-t-136">
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>






<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection