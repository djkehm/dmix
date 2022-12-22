@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')

<div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm">
    @foreach($solicitudes as $solicitud)
    <div class="row gx-5 rounded mb-0 pb-3">
       
        <div class="col rounded-bottom mb-0">
         
            <div class="border border-info rounded mb-0">
              
              <table class="table table-borderless">
                  <thead>
                  </thead>
                  
                  <tbody>
                      <tr><td>Nombre: {!! $solicitud->mix->nombre !!}</td></tr>
                      <tr><td>Descripción: {!! $solicitud->mix->descripcion !!}</td></tr>
                      <tr><td>Duración: {!! $solicitud->mix->duracion !!}</td></tr>
                      <tr><td>Fecha de actualizacion: {!! $solicitud->fecha_actualizacion !!}</td></tr>
                      <tr><td>Precio: ${{number_format( $solicitud->mix->precio  ,"0",".",".")}}</td></tr>
                      <tr><td>Dj: {!! $solicitud->mix->dj->nombre !!}</td></tr>
                      <tr><td>
                        @if($solicitud->estado=='P')
                            Estado: Pendiente
                        @elseif($solicitud->estado=='A')
                                Estado: La venta fue realizada con exito

                        @elseif($solicitud->estado=='R')

                                Estado: La venta no se ha podido llevar a cabo.
                        @endif
                      </td></tr>
                  </tbody>
                
                  <tfoot>
                    <tr>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
                
            </div>
          
        </div>
        
    </div>
    @endforeach
  </div>

  

@endsection