<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\CategoriaReceta;

class RecetaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Auth::user()->recetas;
        return view('recetas.index', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtener las categorias sin modelo
        //$categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');
        $categorias = CategoriaReceta::all(['id', 'nombre']);
       return view('recetas.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
        ]);

        $ruta_imagen = $request['imagen']->store('recetas', 'public');
        
        //Redimencionar imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

        /* Almacenar sin modelo */
        /* DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'ingredientes'=>$data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            'user_id'=>Auth::user()->id,
            'imagen'=>$ruta_imagen,
            'categoria_id'=>$data['categoria'],

        ]); */
       
        //Almacenar con modelo
        auth()->user()->recetas()->create([
            'titulo'=>$data['titulo'],
            'ingredientes'=>$data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            'imagen'=>$ruta_imagen,
            'categoria_id'=>$data['categoria'],
        ]);

        //Redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
