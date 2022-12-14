@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php($rgs = session('rgs'))
@if ($rgs<>'')
    @foreach ($rgs as $rg)
    @php($texto[] = $rg->nombreGe)
    @endforeach
    <script>
           Swal.fire(
              'Genero que más vende!',
              '1-.{{$texto[0]}} <br>2-.{{$texto[1]}}</br> 3-.{{$texto[2]}}',
              'info'
            )
      </script>
@endif

<form class="d-flex mb-3 p-3" name="buscador">
  <input name="buscarporGenero" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{$buscarporGenero}}">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div>
  <a class="cta p-3" href="{{route('Ranking Genero')}}"><button>Ver Ranking Genero</button></a>
</div>

<div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm">
    @foreach($generos as $genero)
    <div class="row gx-5 rounded mb-0 pb-3">
       
        <div class="col rounded-bottom mb-0">
         
            <div class="border border-info rounded mb-0">
              
              <table class="table table-borderless">
                  <thead>
                  </thead>
                  
                    <tbody>

                      <tr><td>Nombre del genero:</td></tr>
                      <td> {!! $genero->nombreGe !!}</td>
  
                      <td>
                        <a class="cta" href={{ route('Filtro Genero',$genero->id)}}><button>Ver Mixes</button></a>
                      </td>
                    </tbody>
                
                </table>
                
            </div>
          
        </div>
        
    </div>
    @endforeach
  </div>

@endsection