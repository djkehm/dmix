@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('rms')<>"")
@php($rms = session('rms'))
@if ($rms<>'')
    @foreach ($rms as $rm)
    @php($texto[] = $rm->nombreMix)
    @endforeach
    <script>
          Swal.fire(
             'Mix más vendidos!',
             '1-.{{$texto[0]}} <br>2-.{{$texto[1]}}</br> 3-.{{$texto[2]}}',
             'info'
           )
        //window.alert(@json($rm->nombreMix))
      </script>
@endif
@endif




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

  <form class="d-flex mb-3" name="buscador">
    <input name="buscarpor" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{$buscarpor ?? ''}}">
    <button class="btn btn-outline-success" type="submit">Buscar por Nombre Mix</button>
  </form>
  

  <div>




    @foreach($mixes as $mix)
    @if($mix->dj->estado_cuenta == 'A')
    <div class="row gx-5 rounded mb-0 pb-3 mt-3">
       
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
                      <tr><td>Dj: {!! $mix->dj->nombreDj !!}</td></tr>
                      <tr><td>Generos: @foreach ($mix->generos as $genero)
                        {!! $genero->nombreGe !!},
                      @endforeach
                      <tr><td>Interpretes: @foreach ($mix->interpretes as $interprete)
                        {!! $interprete->nombreIn !!},
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
   @endif
    @endforeach
  </div>


@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- @php($rms = session('rms'))
@if ($rms<>'')
    @foreach ($rms->all() as $rm)
    <script>
        // Swal.fire(
        //     'No se puede agregar!',
        //     '{{ $rm->nombreMix}}',
        //     'error'
        //   )
        console.log($rm->nombreMix)
      </script>
    @endforeach
@endif --}}



@endsection

@endsection