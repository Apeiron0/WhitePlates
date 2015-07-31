<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model {

	protected $table = 'ventas';
	public $timestamps = false;
	public function ordenes(){
		return $this->belongsToMany('App\Models\Orden','venta_tiene_ordenes', 'idventa','idorden');
	}
	public function personal(){
		return $this->hasOne('App\Models\Personal','id','personal_id');
	}

}