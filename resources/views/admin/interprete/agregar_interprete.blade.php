@extends('layouts.master_admin')





@section('contenido-principal')



<div class="row mt-5">
    <div class="row mt-5">
        <div class="mt-3">
            <div class="col-8 col-md-5 col-lg-4 mx-auto">
                <div class="card alpha2">
                    <div class="card-header alpha2 text-center bg-black">
                        <span>Agregar Interprete o Grupo</span>
                </div>
                <div class="card-body alpha">
                    <div>

                    <form method="POST" action="{{route('interprete.store')}}">
                        <div>
                        @csrf
                        
                        <div class="mb-4 form-group">
                            <label for="nombre-txt" class="form-label">Nombre</label>
                            <input type="text" id="nombreIn" name="nombreIn" class="form-control" placeholder="Nombre del Interprete o Grupo">
                        </div>
                        

                        <div class="card-footer d-grid gap-1 mb-4 text-center">
                            <button id="registrar-btn" class="btn btn-outline-info text-center" type="submit">Agregar Interprete</button>
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