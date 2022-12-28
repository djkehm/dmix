@extends('layouts.master_admin')





@section('contenido-principal')



<div class="row mt-5">
    <div class="row mt-5">
        <div class="mt-3">
            <div class="col-8 col-md-5 col-lg-4 mx-auto">
                <div class="card alpha2">
                    <div class="card-header alpha2 text-center bg-black">
                        <span>Agregar Genero</span>
                </div>
                <div class="card-body alpha">
                    <div>

                    <form method="POST" action="{{route('generos.store')}}">
                        <div>
                        @csrf
                        
                        <div class="mb-4 form-group">
                            <label for="nombre-txt" class="form-label">Nombre</label>
                            <input type="text" id="nombreGe" name="nombreGe" class="form-control" placeholder="Nombre del Genero">
                        </div>
                        

                        <div class="card-footer d-grid gap-1 mb-4 text-center">
                            <button id="registrar-btn" class="btn btn-outline-info text-center" type="submit">Agregar Genero</button>
                        </div>
                    </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-5">
    <div class="mt-5">
        
    </div>

</div>

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        Swal.fire(
            'No se puede agregar!',
            '{{ $error}}',
            'error'
          )
      </script>
    @endforeach
@endif


@endsection

@endsection