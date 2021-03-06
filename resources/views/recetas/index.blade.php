@extends('layouts.app')
    @section('botones')
        <a href="{{route('recetas.create')}}" class="btn btn-primary mr-2 text-white">Crear Receta</a>
    @endsection
    @section('content')
        <h2 class="text-center mb-5">Recetas</h2>
        <div class="col-md-10 mx-auto bg-white p-3">
            <table class="table">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scole="col">T&iacute;tulo</th>
                        <th scole="col">Categor&iacute;a</th>
                        <th scole="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recetas as $receta)
                        
                    <tr>
                        <td>{{$receta->titulo}}</td>
                        <td>{{$receta->categoria->nombre}}</td>
                        <td>
                            <a href="" class="btn btn-danger mr-1">Eliminar</a>
                            <a href="" class="btn btn-dark mr-1">Editar</a>
                            <a href="{{route('receta.show')}}" class="btn btn-success mr-1">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

       {{--  @foreach($recetas as $receta)
            <li>{{ $receta}}</li>
        @endforeach

        <h2>Categorías</h2>
        @foreach($categorias as $categoria)
            <li>{{ $categoria}}</li>
        @endforeach --}}
    @endsection