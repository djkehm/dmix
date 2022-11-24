@extends('layouts/master')

@section('contenido-principal')


<body class="bg-cuenta">
    <div class="container overflow-hidden pt-5 rounded-bottom text-white mb-0 table-responsive-sm">
        <div class="row gx-5 rounded-bottom mb-0 fondo text-white">
            <div class="col rounded-bottom mb-0">
                <div class="text-white mb-0">

                        <table class="table g-0 text-white">
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
        <div class="col-sm-6 col-md-8 pt-3 ps-5">
            ¿Desea editar su informacion?
        </div>
        <div class="col-6 col-md-4  pb-3">
            <a class="cta"><button>Editar</button></a>
        </div>
    </div>

</body>


@endsection