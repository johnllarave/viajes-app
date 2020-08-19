@extends('layouts.app')

@section('title', 'Login')

<!--@section('body-class', 'product-page')-->

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <!--<h1 class="logo-name">IMG</h1>-->
            <div><img src="{{asset('img/logo_sm.png')}}" width="110" height="150"></div><br>
        </div>
        <h3>Plataforma viajes 2.0</h3>
        <p>Ingrese su usuario y contraseña
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <form class="m-t" role="form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="Usuario" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button><br><br>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"><small>¿Olvido su contraseña?</small></a>
            @endif
        </form>
        <p class="m-t"> <small>SM Educación &copy;</small> </p>
    </div>
</div>

@endsection