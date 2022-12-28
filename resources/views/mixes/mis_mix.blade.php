@extends('layouts.master_dj')

@section('contenido-principal')

<a href={{route('Agregar Mix')}} class="float">
  <i class="fa fa-plus my-float"></i>
  </a>
<div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm">
  @foreach($mixes as $mix)
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
                    <tr><td>Generos: @foreach ($mix->generos as $genero)
                      {!! $genero->nombreGe !!},
                    @endforeach
                    </td></tr>
                    <tr><td>Interpretes: @foreach ($mix->interpretes as $interprete)
                      {!! $interprete->nombreIn !!},
                    @endforeach
                    </td></tr>
                </tbody>
              
                <tfoot>
                  <tr>
                    <td><a class="cta" href={{route('Editar Mix', $mix->id)}}><button>Editar</button></a></td>
                    <td><a class="cta" href={{route('eliminar.mix', $mix->id)}}><button>Eliminar</button></a></td>
                  </tr>
                </tfoot>
              </table>
              
          </div>
        
      </div>
      
  </div>
  @endforeach
</div>
@endsection