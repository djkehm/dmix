@php($tipo='')

@if (Auth::user()->tipo_usuario == 'D')
    @php($tipo = 'layouts.master_dj')
@elseif (Auth::user()->tipo_usuario == 'C')
  @php($tipo ='layouts.master')
@endif

@extends($tipo)


@section('contenido-principal')


<div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm">
    @foreach($djs as $dj)
    <div class="row gx-5 rounded mb-0 pb-3">
       
        <div class="col rounded-bottom mb-0">
         
            <div class="border border-info rounded mb-0">
              
              <table class="table table-borderless">
                  <thead>
                  </thead>
                  
                    <tbody>

                      <tr><td>Nombre:</td></tr>
                      <td> {!! $dj->nombre !!}</td>
  
                  
                    </tbody>
                
                </table>
                
            </div>
          
        </div>
        
    </div>
    @endforeach
  </div>

@endsection