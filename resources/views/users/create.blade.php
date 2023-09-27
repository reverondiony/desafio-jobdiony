
@extends('layouts.layout')
  
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header bg-primary text-white text-center">Creación de Usuarios</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-end">
                                    <a class="btn btn-sm btn-danger" href="{{ route('users.index') }}"> Regresar</a>
                                </div>
                            </div>
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                Algunos de los campos son incorrectos.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong class="float-start">Nombre:</strong>
                                        <input type="text" name="nombre"  class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong class="float-start">Usuario:</strong>
                                        <input type="text" name="usuario"  class="form-control" placeholder="Usuario">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong class="float-start">Rol:</strong>
                                        {{ Form::select('id_rol', \App\Models\Rol::all()->pluck('descripcion','id'), isset($c) ? $c->id_rol : old('id_rol'), ['class'=>'form-control custom-select','id'=>'id_rol','placeholder' => 'Seleccione...']) }}
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