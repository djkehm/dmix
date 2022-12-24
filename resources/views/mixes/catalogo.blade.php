@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')

<div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm">
  @if($errors->any())
    
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            @if ($error == 'Solicitud realizada')
              <div class='alert alert-success'>
                <li>{{$error}}</li>
              </div>
            @else
              <div class='alert alert-danger'>
                <li>{{$error}}</li>
              </div>
            @endif
          @endforeach
        </ul>
    
  @endif

    @foreach($mixes as $mix)
    <div class="row gx-5 rounded mb-0 pb-3">
       
        <div class="col rounded-bottom mb-0">
         
            <div class="border border-info rounded mb-0">
              
              <table class="table table-borderless">
                  <thead>
                  </thead>
                  
                  <tbody>
                      <tr><td>Nombre: {!! $mix->nombre !!}</td></tr>
                      <tr><td>Descripción: {!! $mix->descripcion !!}</td></tr>
                      <tr><td>Duración: {!! $mix->duracion !!}</td></tr>
                      <tr><td>Fecha de publicación: {!! $mix->fecha_publicacion !!}</td></tr>
                      <tr><td>Precio: ${{number_format( $mix->precio  ,"0",".",".")}}</td></tr>
                      <tr><td>Dj: {!! $mix->dj->nombre !!}</td></tr>
                      <tr><td>Generos: @foreach ($mix->generos as $genero)
                        {!! $genero->nombre !!},
                      @endforeach
                      <tr><td>Interpretes: @foreach ($mix->interpretes as $interprete)
                        {!! $interprete->nombre !!},
                      @endforeach
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
   
    @endforeach
  </div>

  

@endsection