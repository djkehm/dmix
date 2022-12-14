@extends('layouts.master_dj')





@section('contenido-principal')


<div class="row mt-5">
    <div class="row mt-5">
        <div class="mt-3">
            <div class="col-8 col-md-5 col-lg-4 mx-auto">
                <div class="card alpha2">
                    <div class="card-header alpha2 text-center bg-black">
                        <span>Editar Mix</span>
                </div>
                <div class="card-body alpha">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p>Por favor solucione los siguientes problemas</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>

                    <form method="POST" action="{{route('Editar Mix', $mixes->id)}}">
                        <div>
                        @csrf
                        
                        <div class="mb-4 form-group">
                            <label for="nombre-txt" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del Mix" value={{$mixes->nombre}}>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ingrese la descripción" id="descripcion" name="descripcion" style="height: 100px" value={{$mixes->descripcion}}></textarea>
                            <label for="descripcion">Descripción</label>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="duracion" class="form-label">Tiempo de duración</label>
                            <input step="1" type="time" id="duracion" name="duracion" class="form-control" value={{$mixes->duracion}}>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" id="precio" name="precio" class="form-control" placeholder="Precio $" value={{$mixes->precio}}>
                        </div>


                                         
                        
                        

                        </div>
                        <div class="card-footer d-grid gap-1 mb-4 text-center">
                            <button id="registrar-btn" class="btn btn-outline-info text-center" type="submit">Editar Mix</button>
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


@endsection