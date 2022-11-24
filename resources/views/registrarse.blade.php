<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="csrf-token" content="{{csrf_token()}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style_registro.css')}}">
        <title>Registrarse</title>
      </head>
  <body class="bg-img">
    <header class="fixed-top">
        <nav class="navbar fixes-top navbar-expand-lg navbar-dar fondo__nav sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand centro" href="{{route('home')}}">
                    <img src="{{asset('img/logo.png')}}" class="logo logo-nav" href="{{route('home')}}">
                </a>
            </div>
        </nav>
    </header>
    <main>
        <div class="row mt-5">
            <div class="row mt-5">
                <div class="mt-3">
                    <div class="col-8 col-md-5 col-lg-4 mx-auto">
                        <div class="card alpha2">
                            <div class="card-header alpha2 text-light text-center bg-black">
                                <span>REGISTRARSE</span>
                        </div>
                        <div class="card-body alpha">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <p>Por favor solucione los siguientes problemas</p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{route('usuarios.store')}}">
                                @csrf
                                <div class="mb-4 form-group">
                                    <label for="nombre-txt" class="form-label">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Apellido">
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="email" class="form-label">Correo electronico</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="email@example.com">
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="fecha-txt" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" id="fecha" name="fecha_nacimiento" class="form-control">
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="password2" class="form-label">Repetir contraseña</label>
                                    <input type="password" id="password2" class="form-control" placeholder="Repetir contraseña">
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="numero" class="form-label">Numero</label>
                                    <input type="text" id="numero-txt" name="numero_celular" class="form-control" placeholder="Numero">
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="tipo_usuario">Tipo de usuario: </label>
                                    <label for="tipo_usuario">DJ: </label>
                                    <input type="radio" name="tipo_usuario" value="D">
                                    <label for="tipo_usuario">Cliente: </label>
                                    <input type="radio" name="tipo_usuario" value="C">
                                </div>
                                <div class="card-footer d-grid gap-1 mb-4 text-center">
                                    <button id="registrar-btn" class="btn btn-outline-info text-center" type="submit">Registrarse</button>
                                </div>


                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="mt-5">
                
            </div>
        
        </div>
    </main>




   
  </body>

</html>
