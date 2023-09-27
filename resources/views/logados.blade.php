
@extends('layouts.layout')
 
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header text-center">Listado de Usuarios</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('users.create') }}"> Registrar Usuario</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    
                        <table class="table table-bordered">
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th width="280px">Acciones</th>
                            </tr>
                            @php $i=0; @endphp
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->nombre }}</td>
                                <td>{{ $user->usuario }}</td>
                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    
                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Mostrar</a>
                        
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                        @if(Auth::user()->id_rol == 1)
                                            @csrf
                                            @method('DELETE')
                            
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
      
@endsection