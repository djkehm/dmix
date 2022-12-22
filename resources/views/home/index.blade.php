<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>DMix</title>
  </head>
  <body class="fondo">
    <header>
        
         <img class="logo" src="{{asset('img/logo.png')}}" alt="logo">
         <nav>
          <ul class="nav__links container-fluid">
          </ul>
         </nav>
         
         <a class="cta" data-bs-toggle="dropdown"><button>Comenzar</button></a>


         <ul class="dropdown-menu menu-fondo">
          <li><a class="dropdown-item menu-fondo" href="{{route('login')}}">Iniciar Sesion</a></li>
          <li><a class="dropdown-item menu-fondo" href="{{route('signin')}}">Registrar</a></li>
        </ul>


    </header>
    <main class="container-fluid">
        
      <img src="{{asset('img/Portada19.jpg') }}" class="img-fluid" alt="">

      

    </main>

    <footer class="fondoFooter text-center text-white">
      <!-- Grid container -->
      <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="" href=""
            ><img class="logo" src="{{asset('img/logo.png')}}" /><i class="fab fa-facebook-f"></i
          ></a>
    
          
        </section>
        <!-- Section: Social media -->
    
    
        <!-- Section: Text -->
        <section class="mb-4">
          <p>
            2 Estudiantes de la UTFSM de Chile se ha propuesto llevar la fiesta y discoteque
            a cualquier parte, donde sea que vayan simplemente en su bolsillo, generando así
            tambien una plataforma de marketing e ingresos para los ¡DJ's de todo el mundo!
          </p>
        </section>
        <!-- Section: Text -->
      </div>
      <!-- Grid container -->
    
      <!-- Copyright -->
      <div class="fondoXD text-center p-0.5">
        © 2022 Copyright:
        <a class="text-white" href="">DMIX</a>
      </div>
      <!-- Copyright -->
    </footer>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/axios_config.js')}}"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Esto define una seccion que se va a llamar javascript -->
    @yield("javascript")

  </body>
</html>
