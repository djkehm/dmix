@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')


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
                      <td> {!! $genero->nombre !!}</td>
  
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