@extends('layouts.master_admin')

@section('contenido-principal')

<div class="mt-5 ms-5 me-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Numero</th>
            <th scope='col'>Fecha de nacimiento</th>
            <th scope='col'>Tipo usuario</th>
            <th scope='col'>Acciones</th>
          </tr>
        </thead>
@php($contador = 1)
        <tbody>
        @foreach ($usuarios as $usuario)
          <tr>
            <th scope="row">{!!$contador!!}</th>
            <td>{!!$usuario->nombre!!}</td>
            <td>{!!$usuario->email!!}</td>
            <td>{!!$usuario->numero_celular!!}</td>
            <td>{!!$usuario->fecha_nacimiento!!}</td>
            @if($usuario->tipo_usuario == 'C')
                <td>Cliente</td>
            @elseif ($usuario->tipo_usuario == 'D')
                <td>DJ</td>
            @elseif($usuario->tipo_usuario == 'A')
                <td>Administrador</td>
            @endif
            <td>
                <button type="button" title= 'Eliminar Usuario'class="btn btn-danger show-alert-delete-box" onclick="botonEliminar()  "><i class="fa-solid fa-user-xmark"></i></button>
                <button type="button" title="Editar Usuario" class="btn btn-warning "><i class="fa-solid fa-user-pen"></i></button>

                @if($usuario->tipo_usuario == 'D')
                    <button type="button" title='Ver datos de DJ' class="btn btn-info"><i class="fa-solid fa-address-card"></i></button>
                @endif

                
      
            </td>
            @php($contador = $contador + 1)
          </tr>
        @endforeach
          </tr>
        </tbody>
        
      </table>

</div>

<p class='alert(mensaje)' id='mensaje'></p>





@endsection