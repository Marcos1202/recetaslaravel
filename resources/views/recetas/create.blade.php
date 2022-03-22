@extends('layouts.app')

    @section('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection

    @section('botones')
        <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
    @endsection
    @section('content')
        <h2 class="text-center mb-5">Crear nueva receta</h2>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form action="{{route('recetas.store')}}" method="post" enctype='multipart/form-data'>@csrf
                    <div class="form-group">
                        <label for="titulo">T&iacute;tulo receta</label>
                        <input type="text" name="titulo"  
                            id="titulo" class="form-control @error('titulo') is-invalid @enderror" 
                            placeholder="T&iacute;tulo receta"

                            value="{{old('titulo')}}" >

                        @error('titulo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="titulo">Categor&iacute;a </label>
                        
                        <select name="categoria" id="categoria" class="form-control  @error('categoria') is-invalid @enderror">
                            <option value="">-- Seleccione --</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}" 
                                    {{ old('categoria')  == $categoria->id ? 'selected' : ''}}>
                                    {{$categoria->nombre}}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    
                    </div>

                    <div class="form-group mt-3">
                        <label for="preparacio">Preparaci&oacute;n</label>

                        <input type="hidden" id="preparacion"
                            name="preparacion" 
                            value="{{old('preparacion')}}">
                        <trix-editor   class="form-control trix-content 
                            @error('preparacion') is-invalid @enderror"
                            input="preparacion"></trix-editor>

                        @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="ingredientes">Ingredientes</label>

                        <input type="hidden" id="ingredientes"
                            name="ingredientes" 
                            value="{{old('ingredientes')}}">
                        <trix-editor class="form-control trix-content 
                            @error('ingredientes') is-invalid @enderror"
                            input="ingredientes"></trix-editor>

                        @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="imagen">Elige la imag&eacute;n </label>
                        <input type="file" 
                            name="imagen" 
                            id="imagen"
                            class="form-control
                                @error('ingredientes') is-invalid @enderror"
                            value="{{old('imagen')}}">
                        
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    
                    </div>



                    <div class="form-group">
                        <input type="submit" value="Agregar receta" class="btn btn-primary">
                    </div>
                </form>
            </div>
            
        </div>

    @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @endsection
       
    @endsection