@extends('layouts.app')

@section('title', 'Cambio de contraseña')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <!--<h1 class="logo-name">IMG</h1>-->
            <div><img src="{{asset('img/logo_sm.png')}}" width="110" height="150"></div><br>
        </div>
        <h3>Plataforma viajes 2.0</h3>
        <p>Cambio de contraseña
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <form class="m-t" role="form" action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirme contraseña" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary">Cambiar contraseña</button><br>
        </form>
        <p class="m-t"> <small>SM Educación &copy;</small> </p>
    </div>
</div>
@endsection
