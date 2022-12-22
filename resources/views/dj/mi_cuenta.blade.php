@extends('layouts.master_dj')

@section('contenido-principal')


<body>
    <div class="container overflow-hidden pt-5 rounded-bottom  mb-0 table-responsive-sm pb-3">
        <div class="row gx-5 rounded-bottom mb-0 ">
            <div class="col rounded-bottom">
                <div class=" mb-0 pb-3">
                    <h6>Información cliente</h6>
                        <table class="table g-0 text-white pb-3 fondo">
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
            </div>
            <div class="col-sm-6 col-md-8 ps-5">
                ¿Desea editar su informacion de cliente?
            </div>
            <div class="col-6 col-md-4">
                
                <a class="cta" href="{{route('Editar Datos', Auth::user()->id)}}"><button>Editar</button></a>
            </div>
            <div>
                @foreach($djs as $dj)
                <div class=" mb-0 pt-2">
                    <h6>Información DJ</h6>
                        <table class="table g-0 text-white fondo">
                            
                            <tbody>
                                
                                <tr>
                                    <th scope="row" class="pt-4 pb-4 ps-5">
                                        <i class="fa-regular fa-user"></i>
                                        Nombre:
                                    </th>
                                    <td class="pt-4 pb-4">{!! $dj->nombre !!}</td>
                                </tr>
                                <tr>
                                    <th class="pt-4 pb-4 ps-5" scope="row"><i class="fa-regular fa-envelope"></i>
                                        Email:</th>
                                    <td class="pt-4 pb-4">{!! $dj->email !!}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="pt-4 pb-4 ps-5"><i class="fa-solid fa-mobile-screen-button"></i>
                                        Numero celular:</th>
                                    <td colspan="2" class="pt-4 pb-4">{!! $dj->numero_celular !!}</td>
                                </tr>
                            </tbody>  
                        </table>
                </div>
                @endforeach
        </div>
        @foreach($djs as $dj)
            <div class="col-sm-6 col-md-8 pt-3 ps-5">
                ¿Desea editar su informacion de DJ?
            </div>
            <div class="col-6 col-md-4  pb-3">
                <a class="cta" href={{ route('Editar DJ', $dj->id)}}><button>Editar</button></a>
            </div>
        @endforeach
    </div>

</body>


@endsection