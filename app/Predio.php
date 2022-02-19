<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    //
    protected $table = 'catastro_t_predios';
    protected $fillable=['municipio','zona','manzana','lote','edificio','departamento'];
}
