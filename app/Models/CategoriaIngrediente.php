<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaIngrediente extends Model {

	protected $table = 'categoriasingredientes';
	public $timestamps = true;
	/*public function ingredientes(){
		return $this->belongsToMany('App\Models\Ingrediente','platillo_tiene_ingredientes', 'idingrediente','idplatillo');
	}*/
	public function ingredientes(){
		return $this->hasMany('App\Models\Ingrediente','idcategoriaingrediente','id');
	}

}