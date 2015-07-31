<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
class Personal extends Model {

	protected $table = 'personal';
	public $timestamps = true;
	protected $fillable = ['nombre','apaterno','amaterno','fechanac','telefono','puesto_id','sexo'];

	
	public function puesto(){
		return $this->hasOne('App\Models\Puesto','id','puesto_id');
	}
	public function user(){
		return $this->belongsTo('App\Models\User','id','personal_id');
	}
	

}