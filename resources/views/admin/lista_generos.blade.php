@extends('layouts.master_admin')

@section('contenido-principal')
<a href="" title="Agregar Genero"class="float">
    <i class="fa fa-plus my-float"></i>
</a>
<div class="mt-5 ms-5 me-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Genero</th>
            <th scope='col'>Acciones</th>
          </tr>
        </thead>
@php($contador = 1)
        <tbody>
        @foreach ($generos as $genero)
          <tr>
            <th scope="row">{!!$contador!!}</th>
            <td>{!!$genero->nombre!!}</td>
            <td>
                <button type="button" title= 'Eliminar Genero'class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                <button type="button" title="Editar Genero" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
            @php($contador = $contador + 1)
          </tr>
        @endforeach
          </tr>
        </tbody>
        
      </table>

</div>



@endsection