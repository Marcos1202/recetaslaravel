<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Campos que se almacenaran en la base de datos
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];

    //Obtiene la categoría de la receta via llave foranea
    public function categoria(){
        return $this->belongsTo(CategoriaReceta::class);
    }

}
