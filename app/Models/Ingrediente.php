<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model {

	protected $table = 'ingredientes';
	public $timestamps = true;
	public function categoria(){
		return $this->hasOne('App\Models\CategoriaIngrediente','id','idcategoriaingrediente');
	}

}