@extends('layouts.master')

@section('contenido-principal')


<body>
    <div class="container overflow-hidden pt-5 rounded-bottom mb-0 table-responsive-sm pb-3">
        <div class="row gx-5 rounded-bottom mb-0">
            <div class="col rounded-bottom pb-3">
                <div class="text-white mb-0 pb-3">
                    <h6>Información cliente</h6>
                        <table class="table g-0 text-white fondo pb-3">
                            <tbody>
                                <tr>
                                    <th scope="row" class="pt-4 pb-4 ps-5">
                                        <i class="fa-regular fa-user"></i>
                                        Nombre:
                                    </th>
                                    <td class="pt-4 pb-4">{{Auth::user()->nombre}}</td>
                                </tr>
                                <tr>
                                    <th class="pt-4 pb-4 ps-5" scope="row"><i class="fa-regular fa-envelope"></i>
                                        Email:</th>
                                    <td class="pt-4 pb-4">{{Auth::user()->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="pt-4 pb-4 ps-5"><i class="fa-solid fa-cake-candles"></i>
                                        Fecha de nacimiento:</th>
                                    <td colspan="2" class="pt-4 pb-4">{{Auth::user()->fecha_nacimiento}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="pt-4 pb-4 ps-5"><i class="fa-solid fa-mobile-screen-button"></i>
                                        Numero celular:</th>
                                    <td colspan="2" class="pt-4 pb-4">{{Auth::user()->numero_celular}}</td>
                                </tr>
                            </tbody>  
                        </table>
                </div>

        <div class="col-6 col-md-4  pb-3">
            ¿Desea editar su informacion?
            <a class="cta" href="{{route('Editar Datos', Auth::user()->id)}}"><button>Editar</button></a>
        </div>

        <div class="col-6 col-md-4  pb-3">
            ¿Desea eliminar la cuenta de Dj?
            <form action="{{route('Eliminar Cuenta Usuario', Auth::user()->id)}}" class='d-inline btn-eliminarUS'>
                @method('DELETE')
                @csrf
                <button type="submit" name='btn-eliminarUS' title= 'Eliminar cuenta Usuario'class="btn btn-danger show-alert-delete-box">
                  Eliminar Cuenta Usuario
                </button>
              </form>
        </div>
    </div>

</body>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $('.btn-eliminarUS').submit(function(e){
      e.preventDefault();
      Swal.fire({
      title: 'Estas seguro?',
      text: "Estas seguro que quieres Eliminar tu cuenta? Despues de esto no hay vuelta atras",
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