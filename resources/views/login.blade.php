@extends('layouts.layout')
@section('content')
@if(session('success'))
    <div class="alert alert-danger">{{session('success')}}</div>
@endif                
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">  
                <div class="card"> 
                    @if(!empty($noticias->imagen))
                        <img class="card-img-top" src="data:image/jpg;base64,{{ $noticias->imagen }}" />
                        <div class="card-body">
                            <h5 class="card-title"> <b>Titulo: </b>{{ $noticias->titulo }}</h5>
                            <h5 class="card-title"> <b>Autor: </b>{{ $noticias->autor }}</h5>
                            <h5 class="card-title"> <b>Categoria: </b>{{ $noticias->categoria->descripcion }}</h5>
                            <h5 class="card-title"> <b>Responsable: </b>{{ $noticias->user->nombre }}</h5>
                            <p class="card-text"> {{ $noticias->contenido }}</p>
                            <a href="{{ route('noticias.show',$noticias->id) }}" class="btn btn-primary">Ver Noticia</a>
                        </div>
                    @else
                        <img class="card-img-top" src="{{ asset('img/noticias.png') }}" alt="noticias">
                        <div class="card-body">
                            <h5 class="card-title">Visitar</h5>
                            <p class="card-text">Las mejores noticias en un solo canal</p>
                            <a href="#" class="btn btn-primary">Ver Noticia</a>
                        </div>
                    @endif
                
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Iniciar Sesion</h3>
                    <div class="card-body">
                        <div class="text-center"><img src="{{ asset('img/dionoticias.png') }}" style="width:100px;" /></div>
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