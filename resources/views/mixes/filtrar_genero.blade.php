@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')

<form class="d-flex mb-3 p-3" name="buscador">
  <input name="buscarporGeneroMix" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{$buscarporGeneroMix}}">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm">
  @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>     
  @endif

  @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>     
  @endif
    @foreach($mixes as $mix)
    @if($mix->dj->estado_cuenta == 'A')
    <div class="row gx-5 rounded mb-0 pb-3">
       
        <div class="col rounded-bottom mb-0">
         
            <div class="border border-info rounded mb-0">
              
              <table class="table table-borderless">
                  <thead>
                  </thead>
                  
                  <tbody>
                      <tr><td>Nombre: {!! $mix->nombreMix !!}</td></tr>
                      <tr><td>Descripción: {!! $mix->descripcion !!}</td></tr>
                      <tr><td>Duración: {!! $mix->duracion !!}</td></tr>
                      <tr><td>Fecha de publicación: {!! $mix->fecha_publicacion !!}</td></tr>
                      <tr><td>Precio: ${{number_format( $mix->precio  ,"0",".",".")}}</td></tr>
                      <tr><td>Dj: {!! $mix->DJ->nombreDj!!}</td></tr>
                      </td></tr>
                      <tr><td>Generos: @foreach ($mix->generos as $genero)
                        {!! $genero->nombreGe !!},
                      @endforeach                    
                      <tr><td>Interpretes: @foreach ($mix->interpretes as $interprete)
                        {!! $interprete->nombreIn !!},
                      @endforeach
                    </td></tr>
                  </tbody>
                
                  <tfoot>
                    <tr>
                      <td></td>
                      <td>
                        <a class="cta" href={{ route('store.solicitud',$mix->id)}}><button>Solicitar</button></a>
                      </td>
                    </tr>
                  </tfoot>
                </table>
                
            </div>
          
        </div>
        
    </div>
    @endif
    @endforeach
  </div>

  

@endsection