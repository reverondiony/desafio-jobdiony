
@extends('layouts.layout')
  
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header text-center">Crear Noticia</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Nueva Noticia</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('noticias.index') }}"> Regresar</a>
                                </div>
                            </div>
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                Datos invalidas, Favor validar<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_usuario" value="{{ Auth::id() }}" />
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Titulo:</strong>
                                        <input type="text" name="titulo"  class="form-control" placeholder="Titulo">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Autor:</strong>
                                        <input type="text" name="autor"  class="form-control" placeholder="Autor">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Contenido:</strong>
                                        <textarea class="form-control" style="height:150px" name="contenido" placeholder="Contenido"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Imagen:</strong>
                                        <input type="file" name="imagen" accept="image/*" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Categoria:</strong>
                                        {{ Form::select('id_categoria', \App\Models\Categoria::all()->pluck('descripcion','id'), isset($c) ? $c->id_categoria : old('id_categoria'), ['class'=>'form-control custom-select','id'=>'id_categoria','placeholder' => 'Seleccione...']) }}
                                    </div>
                                </div>
                            <br>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center"  style="margin-top:10px;">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection