@extends('layouts.layout')
@section('content')
@if(session('success'))
    <div class="alert alert-danger">{{session('success')}}</div>
@endif                
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">  
                <div class="card card-fluid"> 
                    @if(!empty($noticias->imagen))
                        <img class="card-img-top img-fluid rounded" src="data:image/jpg;base64,{{ $noticias->imagen }}" style="width:650px;" />
                        <a href="{{ route('noticias.show',$noticias->id) }}" class="btn btn-sm btn-primary" style="padding-top:-20px !important;"> Ver Noticia <i class="fas fa-arrow-alt-circle-right"></i></a>
                        <div class="card-body">
                            <h6 class="card-title alert alert-primary"> 
                                <b>Titulo: </b>{{ $noticias->titulo }}
                                
                            </h6>
                            <p style="text-align:left !important;">
                                <b>Autor: </b>{{ $noticias->autor }}<br>
                                <b>Categoria: </b>{{ $noticias->categoria->descripcion }}<br>
                                <b>Responsable: </b>{{ $noticias->user->nombre }}<br>
                            </p>
                            <p style="text-align:justify !important;"> {{ $noticias->contenido }}</p>
                            
                        </div>
                    @else
                        <img class="card-img-top img-fluid" src="{{ asset('img/noticias.png') }}" alt="noticias" >
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
                    <h3 class="card-header bg-primary text-white text-center">Iniciar Sesion</h3>
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
                                <button type="submit" class="btn btn-dark btn-block">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection