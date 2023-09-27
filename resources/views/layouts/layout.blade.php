<!DOCTYPE html>
<html>
<head>
    <title>Aplicacion de Noticias</title>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--SE LLAMA LA HOJA DE ESTILOS-->
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet"/>
</head>
<body>
  
<div class="container">
    <div class="abs-center">
        @yield('content')
    </div>
</div>
   
</body>
</html>