@extends('layouts.master_admin')

@section('contenido-principal')
<a href="{{route('Agregar Interprete')}}" title="Agregar Interprete"class="float">
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
            <td>{!!$interprete->nombreIn!!}</td>
            <td>
              <form action="{{route('destoy.interprete', $interprete->id)}}" class='d-inline btn-eliminar'>
                @method('DELETE')
                @csrf
                <button type="submit" name= 'btn-eliminar-interprete' title= 'Eliminar Interprete' class="btn btn-danger show-alert-delete-box">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
              </form>




                <a type="button" title="Editar Interprete" name="btn-editarGenero" id="btn-editarGenero" href="{{route('edit.interprete', $interprete->id)}}" class="btn btn-warning text-white">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
            @php($contador = $contador + 1)
          </tr>
        @endforeach
          </tr>
        </tbody>
        
      </table>

</div>



@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php($interpreteID = session('interprete'))
  @if(session('interprete')<> "")

    <script>
      Swal.fire({
        title: 'Estas seguro que quieres editar?',
        text: "El Interprete pertenece a Mix esto podria traer cambios para los filtros",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, editar'
        }).then((result) => {
          if (result.isConfirmed) {
            //this.submit();
            //window.alert($genero)
            location.href = "{{ route('Editar Interprete', $interpreteID)}}";

          }
        })

    </script>
    


  
  @endif

@if(session('mensaje')=='no')

  <script>
    Swal.fire(
      'No se puede Eliminar',
      'El Interprete pertenece a Mix que estan a la venta',
      'error'
    )
  </script>
@elseif(session('mensaje')=='ok')
<script>
  Swal.fire(
      'Eliminado!',
      'El interprete ha sido eliminado.',
      'success'
    )
</script>

@elseif(session('mensaje')=='Aok')
<script>
  Swal.fire(
      'Agregado!',
      'El interprete se ha agregado con exito.',
      'success'
    )
</script>

@elseif (session('mensaje')=='Eok')
<script>
  Swal.fire(
      'Editado!',
      'El interprete se ha editado con exito.',
      'success'
    )
</script>
@endif

<script>

  $('.btn-eliminar').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: 'Estas seguro?',
    text: "Estas seguro que quieres eliminar el interprete?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar'
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