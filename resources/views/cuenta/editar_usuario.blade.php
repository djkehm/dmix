@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)

@section('contenido-principal')

<div class="row mt-5">
    <div class="row mt-5">
        <div class="mt-3">
            <div class="col-8 col-md-5 col-lg-4 mx-auto">
                <div class="card alpha2">
                    <div class="card-header text-center bg-black">
                        <span>Editar Datos</span>
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

                    <form method="POST" action="{{route('ususario.update', Auth::user()->id)}}">
                        @csrf

                            <div class="mb-4 form-group">
                                <label for="nombre-txt" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{$usuarios->nombre}}" placeholder="DjEjemplo">
                            </div>
                            <div class="mb-4 form-group">
                                <label for="email" class="form-label">Correo electronico</label>
                                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$usuarios->email}}"placeholder="email@example.com">
                            </div>
                        
                            <div class="mb-4 form-group">
                                <label for="numero" class="form-label">Numero</label>
                                <input type="text" id="numero-txt" name="numero_celular" class="form-control @error('numero_celular') is-invalid @enderror" value="{{$usuarios->numero_celular}}" placeholder="Numero">
                            </div>
                            <div class="card-footer d-grid gap-1 mb-4 text-center">
                                <button id="registrar-btn" class="btn btn-outline-info text-center" type="submit">Editar</button>
                            </div>

                        
                        
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection