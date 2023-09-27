<!DOCTYPE html>
<html>
<head>
    <title>Aplicacion de Noticias</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--SE LLAMA LA HOJA DE ESTILOS-->
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <!--ESTILOS DE ICONOS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <!--DATATABLE-->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!--DATATABLE-->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $('document').ready(function () {
            let table = new DataTable('#myTable');
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('noticias.index') }}">
                    <img src="{{ asset('img/dionoticias.png') }}" style="width:30px;" />
                    DioNoticias
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-lock-open"></i> {{ __('Iniciar Sesión') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-edit"></i> {{ __('Registrese') }}</a>
                            </li>
                        @else
                            @if(Auth::user()->id_rol == 1)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user"></i> 
                                        {{ __('Usuario') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('users.create') }}">
                                            <i class="fas fa-edit"></i> {{ __('Registrar') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            <i class="fas fa-th-list"></i> {{ __('Listado') }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                            
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-edit"></i> 
                                        {{ __('Noticias') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                            <a class="dropdown-item" href="{{ route('noticias.create') }}">
                                                <i class="fas fa-edit"></i> {{ __('Registrar') }}
                                            </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('noticias.index') }}">
                                            <i class="fas fa-th-list"></i> {{ __('Listado') }}
                                        </a>
                                    </div>
                                </li>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i> {{ Auth::user()->nombre }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-door-closed"></i> {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
    </nav>
    <div class="container">
        <div class="abs-center tabcontent-1" style="margin-bottom:20px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Existen algunos errores con tus campos<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
   
    <!--<footer>
        <h6>Todos los derechos reservados</h6>
    </foorter>-->
</body>
</html>