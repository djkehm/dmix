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
        <title>Iniciar Sesion</title>
      </head>
    <header class="bg-black sticky-top">
        <nav class="navbar fixes-top navbar-expand-lg navbar-dar fondo__nav">
            <div class="container-fluid">
                <a class="navbar-brand centro" href="{{route('home')}}">
                    <img src="{{asset('img/logo.png')}}" class="logo logo-nav" href="{{route('home')}}">
                </a>
            </div>
        </nav>
    </header>
    <main>
        <body class=bg-img2>
            <div class="row mt-5">
                <div class="row mt-5">
                    <div class="mt-5">
                        <div class="col-8 col-md-4 col-lg-4 mx-auto">
                            <div class="card alpha">
                                <div class="card-header alpha2 text-light text-center bg-black">
                                    <span>Iniciar Sesion</span>
                                </div>
        
                                <form method="POST" action="{{route('usuarios.login')}}">

                                    
                                    @csrf
                                    <div class="card-body">
        
                                        <div class="mb-3">
                                            <label for="nombre-txt" class="form-label">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="email@example.com" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="anio-txt" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    

                                    <div class="card-footer d-grid gap-1 alpha2">
                                        <button type="submit" id="iniciar_sesion-btn" class="btn btn-outline-success">Inciar Sesion</button>
                                    </div>
                                    <div class="card-footer d-grid gap-1 alpha2 text-center">
                                        <a>ó</a>
                                        <a>¿No tienes cuenta?</a>
                                        <a class="btn btn-outline-info" href="{{route('signin')}}">¡Registrate!</a>
                                    </div>
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
        
                                </form>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="mt-5">
                    
                </div>
            </div>
        </body>
    </main>



</html>
