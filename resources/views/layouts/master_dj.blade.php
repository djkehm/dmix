<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style_dashboard.css')}}">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.all.min.js"></script>

    <link href="{{asset('dist/css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('dist/js/select2.min.js')}}"></script>
    <title>{{Route::current()->getName()}}</title>
  </head>
  <body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg fondo">
        <!--CONTAINER COMPLETO DE NAVBAR-->
        <div class="container-fluid">

            <!--LOGO-->
            <a class="navbar-brand" href="{{route('Catalogo')}}">
                <img src="{{asset('img/logo.png')}}"  class="logo">
            </a> 
            <!--LOGO-->

        <!----------------------------------------->

          <!--ITEMS CENTRO-->
          <ul class="align-self-center nav__links container d-flex justify-content-center navbar-nav">
            <li class="nav-item"><a href="{{route('Catalogo')}}">Catalogo</a></li>
            <li><a href="{{route("Dj's")}}">DJ's</a></li>
            <li><a href="{{route("Buscar Genero")}}">Buscar genero</a></li>
          </ul>
          <!--ITEMS CENTRO-->

        <!----------------------------------------->

          <!--EL MENU QUE SE EXPANDE DEL USUARIO-->
          <li class="nav-item dropdown text-white"> 
            <div class="align-self-center navbar-nav nav-link text-white" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                BIENVENID@:<b>&nbsp;{{Auth::user()->nombre}}</b> <!--MUESTRA EL NOMBRE DE USUARIO-->
              </div>

            <!--ITEM DEL MENU EXPANDIDO-->

              <ul class="dropdown-menu justify-content-end bg-dark" aria-labelledby="navbarScrollingDropdown">

                <!--ITEMS SEPARADOS-->
                  <li><a class="dropdown-item nav__links" href="{{route('Mi Cuenta DJ')}}">Mi cuenta</a></li>
                  <li><a class="dropdown-item nav__links" href="{{route('mis.mix')}}">Mis Mix</a></li>
                  <li><a class="dropdown-item nav__links" href={{route('Solicitudes')}}>Mis solicitudes</a></li>
                  <li><hr class="dropdown-divider nav__links"></li>
                  <li><a class="dropdown-item nav__links" href="{{route('usuarios.logout')}}">Cerrar sesión</a></li>
                <!--ITEMS SEPARADOS-->

              </ul>

             <!--ITEM DEL MENU EXPANDIDO-->
          </li>
         <!--EL MENU QUE SE EXPANDE DEL USUARIO-->

        </div>
        <!--CONTAINER COMPLETO DE NAVBAR-->
      </nav>
      <!--NAVBAR-->

      @yield('contenido-principal')


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6358d70998.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="{{asset('js/mas_genero.js')}}"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>