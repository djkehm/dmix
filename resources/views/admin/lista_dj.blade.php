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

        @if($dj->estado_cuenta == 'A')
          <tr>
            <th scope="row">{!!$contador!!}</th>
            <td>{!!$dj->nombreDj!!}</td>
            <td>{!!$dj->email!!}</td>
            <td>{!!$dj->numero_celular!!}</td>
            <td>{!!$dj->usuario_id!!}</td>
            <td>


                <form action="{{route('Eliminar DJ', $dj->id)}}" class='d-inline btn-eliminar'>
                    @method('DELETE')
                    @csrf
                    <button type="submit" name= btn-eliminar title= 'Eliminar DJ'class="btn btn-danger show-alert-delete-box">
                      <i class="fa-solid fa-user-xmark"></i>
                    </button>
                </form>


        
            </td>
            @php($contador = $contador + 1)
          </tr>
        @endif
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
  @endif

  @php($djID = session('dj'))
  @if($dj=session('dj')<> "")

    <script>
      Swal.fire({
        title: 'Estas seguro?',
        text: "El DJ tiene contenido relacionado, estas seguro de inhabilitar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, inhabilitar'
        }).then((result) => {
          if (result.isConfirmed) {
            //this.submit();
            //window.alert($dj)
            location.href = "{{ route('Confirmado DJ', $djID)}}";

          }
        })

    </script>
    


  
  @endif

  <script>

    $('.btn-eliminar').submit(function(e){
      e.preventDefault();
      Swal.fire({
      title: 'Estas seguro?',
      text: "Estas seguro que quieres inhabilitar como Dj?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, inhabilitar'
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
          //window.location.href = "{{ route('pruebaJS')}}";

        }
      })
    })
    

  </script>


@endsection


@endsection