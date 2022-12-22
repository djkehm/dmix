@extends('layouts.master_admin')

@section('contenido-principal')

<div class="mt-5 ms-5 me-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre artistico</th>
            <th scope="col">Email profesional</th>
            <th scope="col">Numero profesional</th>
            <th scope='col'>Usuario ID asociado</th>
            <th scope='col'>Acciones</th>
          </tr>
        </thead>
@php($contador = 1)
        <tbody>
        @foreach ($djs as $dj)
          <tr>
            <th scope="row">{!!$contador!!}</th>
            <td>{!!$dj->nombre!!}</td>
            <td>{!!$dj->email!!}</td>
            <td>{!!$dj->numero_celular!!}</td>
            <td>{!!$dj->usuario_id!!}</td>
            <td>
                <button type="button" title= 'Eliminar Usuario'class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i></button>
                <button type="button" title="Editar Usuario" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></button>
            </td>
            @php($contador = $contador + 1)
          </tr>
        @endforeach
          </tr>
        </tbody>
        
      </table>

</div>



@endsection