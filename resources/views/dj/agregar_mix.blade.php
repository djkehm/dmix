@extends('layouts.master_dj')





@section('contenido-principal')


<div class="row mt-5">
    <div class="row mt-5">
        <div class="mt-3">
            <div class="col-8 col-md-5 col-lg-4 mx-auto">
                <div class="card alpha2">
                    <div class="card-header alpha2 text-center bg-black">
                        <span>Agregar Mix</span>
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

                    <form method="POST" action="{{route('mixes.store')}}">
                        <div>
                        @csrf
                        
                        <div class="mb-4 form-group">
                            <label for="nombre-txt" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del Mix">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ingrese la descripción" id="descripcion" name="descripcion" style="height: 100px"></textarea>
                            <label for="descripcion">Descripción</label>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="duracion" class="form-label">Tiempo de duración</label>
                            <input step="1" type="time" id="duracion" name="duracion" class="form-control">
                        </div>
                        <div class="mb-4 form-group">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" id="precio" name="precio" class="form-control" placeholder="Precio $">
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ingrese los nombres de los interpretes, separados por una ','" id="interpretes" name="interpretes" style="height: 100px"></textarea>
                            <label for='interpretes'>Interprete</label>
                            
                        </div>
                        <div class="mb-3">
                            <label for="interpretes">Ingrese los nombres de los interpretes, separados por una ','</label>
                        </div>
                        

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                        <div id="formulario" class='mb-4'>
                        <label for="Generos">Generos</label>
                        <button type="button" class="clonar btn btn-secondary btn-sm">+</button>
                        <div class="input-group">
                            <select name="generos[]" class="js-example-basic-single col-md-6">
                                @foreach( $generos as $genero)
                                    <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <select class="form-control" id="search" style="width:500px;" name="user_id"></select>
                        <script type="text/javascript">

                            var path = {{route('busqueda')}};
                        
                          
                        
                            $('#search').select2({
                        
                                placeholder: 'Select an user',
                        
                                ajax: {
                        
                                  url: path,
                        
                                  dataType: 'json',
                        
                                  delay: 250,
                        
                                  processResults: function (genero) {
                        
                                    return {
                        
                                      results:  $.map(genero, function (item) {
                        
                                            return {
                        
                                                text: item.nombre,
                        
                                                id: item.id
                        
                                            }
                        
                                        })
                        
                                    };
                        
                                  },
                        
                                  cache: true
                        
                                }
                        
                              });
                        
                          
                        
                        </script>
                        
                        

                        </div>
                        <div class="card-footer d-grid gap-1 mb-4 text-center">
                            <button id="registrar-btn" class="btn btn-outline-info text-center" type="submit">Agregar Mix</button>
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