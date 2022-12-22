@extends('layouts.master_admin')

@section('contenido-principal')
<a href="" title="Agregar Interprete"class="float">
    <i class="fa fa-plus my-float"></i>
</a>
<div class="mt-5 ms-5 me-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Interprete o Grupo</th>
            <th scope='col'>Acciones</th>
          </tr>
        </thead>
@php($contador = 1)
        <tbody>
        @foreach ($interpretes as $interprete)
          <tr>
            <th scope="row">{!!$contador!!}</th>
            <td>{!!$interprete->nombre!!}</td>
            <td>
                <button type="button" title= 'Eliminar Interprete'class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                <button type="button" title="Editar Interprete" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
            @php($contador = $contador + 1)
          </tr>
        @endforeach
          </tr>
        </tbody>
        
      </table>

</div>



@endsection