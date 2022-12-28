@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php($rds = session('rds'))
@if ($rds<>'')
    @foreach ($rds as $rd)
    @php($texto[] = $rd->nombreDj)
    @endforeach
    <script>
           Swal.fire(
              'Dj que más vende!',
              '1-.{{$texto[0]}} <br>2-.{{$texto[1]}}</br> 3-.{{$texto[2]}}',
              'info'
            )
      </script>
@endif

<form class="d-flex mb-3 p-3" name="buscador">
  <input name="buscarporDj" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{$buscarporDj}}">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div>
  <a class="cta p-3" href="{{route('Rankind DJ')}}"><button>Ver Ranking Dj</button></a>
</div>

<div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm p-3">
  
    @foreach($djs as $dj)
    <div class="row gx-5 rounded mb-0 pb-3">
       
        <div class="col rounded-bottom mb-0">
         
            <div class="border border-info rounded mb-0">
              
              <table class="table table-borderless">
                  <thead>
                  </thead>
                  
                    <tbody>

                      <tr><td>Nombre:</td></tr>
                      <td> {!! $dj->nombreDj !!}</td>
  
                      <td>
                        <a class="cta" href={{ route('mixDj',$dj->id)}}><button>Ver Mixes</button></a>
                      </td>
                    </tbody>
                
                </table>
                
            </div>
          
        </div>
        
    </div>
    @endforeach
  </div>

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php($rds = session('rds'))
@if ($rds<>'')
    @foreach ($rds as $rd)
    @php($texto[] = $rd->nombreDj)
    @endforeach
    <script>
          // Swal.fire(
          //    'Mix más vendidos!',
          //    '1-.{{$texto[0]}} <br>2-.{{$texto[1]}}</br> 3-.{{$texto[2]}}',
          //    'info'
          //  )
        console.log($texto[0])
      </script>
@endif

@endsection
@endsection