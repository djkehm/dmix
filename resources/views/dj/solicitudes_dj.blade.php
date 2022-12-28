@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')



<div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm">
  @php($ganancias = 0)
  
    @foreach($solicitudes as $solicitud)
    
    <div class="row gx-5 rounded mb-0 pb-3">
        <div class="col rounded-bottom mb-0">
            <div class="border border-info rounded mb-0">
              
              <table class="table table-borderless">
                  <thead>
                  </thead>
                  
                  <tbody>
                      <tr><td>Nombre Mix: {!! $solicitud->nombreMix !!}</td></tr>
                      <tr><td>Nombre Cliente: {!! $solicitud->nombreClie !!}</td></tr>
                      <tr><td>Correo Cliente: {!! $solicitud->email !!}</td></tr>
                      <tr><td>Numero Celular Cliente: {!! $solicitud->numero_celular !!}</td></tr>
                      <tr><td>Fecha de actualizacion: {!! $solicitud->fecha_actualizacion !!}</td></tr>
                      <tr><td>Precio: ${{number_format( $solicitud->precio  ,"0",".",".")}}</td></tr>
                      <tr><td>
                        @if($solicitud->estado=='P')
                            Estado: Pendiente
                        @elseif($solicitud->estado=='A')
                                Estado: La venta fue realizada con exito
                                @php($ganancias = $ganancias + $solicitud->precio)
                        @elseif($solicitud->estado=='R')

                                Estado: La venta no se ha podido llevar a cabo.
                        @endif
                      </td></tr>
                      @if($solicitud->estado == 'P')
                        <tr>
                            <td><a class="cta" href={{ route('update.solicitud',[$solicitud->id,'A'])}}><button>Aceptar</button></a></td>
                            <td><a class="cta" href={{ route('update.solicitud',[$solicitud->id,'R'])}}><button>Rechazar</button></a></td>
                        </tr>
                      @endif
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
    <div class="mb-5">
    Ganancias totales desde su registro: ${{number_format($ganancias  ,"0",".",".")}}
    </div>
  </div>

  

@endsection