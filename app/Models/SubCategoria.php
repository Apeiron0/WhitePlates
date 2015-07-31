<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model {

	protected $table = 'subcategorias';
	public $timestamps = true;
	public function categoria(){
		return $this->belongsTo('App\Models\Categoria','idcategoria','id');
	}

}