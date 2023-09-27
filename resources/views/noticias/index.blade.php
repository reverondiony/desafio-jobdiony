
@extends('layouts.layout')
 
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header text-center">Listado de Noticias</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('noticias.create') }}"> Registrar Noticia</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Nro</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Categoria</th>
                                    <th>Contenido</th>
                                    <th>Imagen</th>
                                    <th width="280px">Acciones</th>
                                </tr>
                            </thead>
                            @php $i=0; @endphp
                            <tbody>
                                @foreach ($noticias as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->titulo }}</td>
                                    <td>{{ $user->autor }}</td>
                                    <td>{{ $user->categoria->descripcion }}</td>
                                    <td>{{ $user->contenido }}</td>
                                    <td class="text-center">
                                    
                                        <!--<img src="{{ storage_path($user->imagen) }}" />-->
                                        <img src="data:image/jpg;base64,{{ $user->imagen }}" style="width:40px;" />
                                        
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('noticias.destroy',$user->id) }}" method="POST">
                        
                                            <a class="btn btn-info" href="{{ route('noticias.show',$user->id) }}">Mostrar</a>
                                            @if(Auth::check() && (Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2))
                                                <a class="btn btn-primary" href="{{ route('noticias.edit',$user->id) }}">Editar</a>
                            
                                                @csrf
                                                @method('DELETE')
                                
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
      
@endsection