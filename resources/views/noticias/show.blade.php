@extends('layouts.layout')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Datos de la Noticias </h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="card">
                                @if(!empty($noticias->imagen))
                                    <img class="card-img-top" src="data:image/jpg;base64,{{ $noticias->imagen }}" />
                                @else
                                    <img class="card-img-top" src="{{ asset('img/noticias.png') }}" alt="noticias">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title"> <b>Titulo: </b>{{ $noticias->titulo }}</h5>
                                    <h5 class="card-title"> <b>Autor: </b>{{ $noticias->autor }}</h5>
                                    <h5 class="card-title"> <b>Categoria: </b>{{ $noticias->categoria->descripcion }}</h5>
                                    <h5 class="card-title"> <b>Responsable: </b>{{ $noticias->user->nombre }}</h5>
                                    <p class="card-text"> {{ $noticias->contenido }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection