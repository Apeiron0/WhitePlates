<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platillo extends Model {

	protected $table = 'platillos';
	public $timestamps = true;
	public function ingredientes(){
		return $this->belongsToMany('App\Models\Ingrediente','platillo_tiene_ingredientes', 'idplatillo','idingrediente');
	}
	public function subcategoria(){
		return $this->hasOne('App\Models\SubCategoria','id','idsubcategoria');
	}

}