@extends('layouts.layout')
@section('content')
@if(session('success'))
    <h1>{{session('success')}}</h1>
@endif                
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Iniciar Sesion</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('custom-login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Usuario" id="usuario" class="form-control" name="usuario" required
                                    autofocus>
                                @if ($errors->has('usuario'))
                                <span class="text-danger">{{ $errors->first('usuario') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recuerdame
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection