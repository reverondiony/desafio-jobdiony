
@extends('layouts.layout')
 
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h3 class="card-header bg-primary text-white text-center">Listado de Noticias</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <div class="float-end">
                                    <a class="btn btn-sm btn-success" href="{{ route('noticias.create') }}"> Registrar Noticia</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="thead-dark">
                                <tr >
                                    <th class="text-center">Nro</th>
                                    <th class="text-center">Titulo</th>
                                    <th class="text-center">Autor</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Contenido</th>
                                    <th class="text-center">Imagen</th>
                                    <th width="280px" class="text-center">Acciones</th>
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
                        
                                            <a class="btn btn-sm btn-info" href="{{ route('noticias.show',$user->id) }}"><i class="fas fa-th-list" title="Mostrar"></i></a>
                                            @if(Auth::check() && (Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2))
                                                <a class="btn btn-sm btn-primary" href="{{ route('noticias.edit',$user->id) }}"><i class="fas fa-edit" title="Editar"></i> </a>
                            
                                                @csrf
                                                @method('DELETE')
                                
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash" title="Eliminar"></i> </button>
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