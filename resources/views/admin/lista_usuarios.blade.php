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
            @if($usuario->tipo_usuario <> 'A')
              @if($usuario->estado_cuenta == 'A')
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
                  <form action="{{route('Eliminar Usuario', $usuario->id)}}" class='d-inline btn-eliminar'>
                    @method('DELETE')
                    @csrf
                    <button type="submit" name= btn-eliminar title= 'Eliminar Usuario'class="btn btn-danger show-alert-delete-box">
                      <i class="fa-solid fa-user-xmark"></i>
                    </button>
                  </form>
                    

                  
                    @if($usuario->tipo_usuario == 'D')
                        <a type="button" title='Ver datos de DJ' name="btn-verDj" class="btn btn-info" href="{{route('Datos como DJ', $usuario->id)}}"><i class="fa-solid fa-address-card"></i></a>
                    @endif

                    
          
                </td>
                @php($contador = $contador + 1)
              @endif
            @endif
          </tr>
        @endforeach
          </tr>
        </tbody>
        
      </table>


           


</div>

@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if(session('mensaje')=='ok')
    <script>
      Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
    </script>
  @elseif(session('error')=='dj')
    <script>
      Swal.fire(
        'El usuario no se puede inhabilitar',
        'Esta registrado como DJ, debes inhabilitarlo como DJ primero',
        'error'
      )
    </script>
  @endif


  <script>

    $('.btn-eliminar').submit(function(e){
      e.preventDefault();
      Swal.fire({
      title: 'Estas seguro?',
      text: "Estas seguro que quieres inhabilitar el usuario?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, inhabilitar'
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        }
      })
    })
    

  </script>
@endsection





@endsection