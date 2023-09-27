
@extends('layouts.layout')
  
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header text-center">Registrese</h3>
                    <div class="card-body">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{ route('postRegister') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong class="text-izq">Nombre:</strong>
                                        <input type="text" name="nombre"  class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Usuario:</strong>
                                        <input type="text" name="usuario"  class="form-control" placeholder="Usuario">
                                    </div>
                                </div>
                                <input name="id_rol" type="hidden" value="3" />
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Usuario:</strong>
                                        <input type="password" name="password"  class="form-control" placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top:10px;">
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