<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Orden extends Model {

	protected $table = 'ordenes';
	public $timestamps = true;
	protected $appends = array('platillo_count','platillo_total');
	public function platillos(){
		return $this->belongsToMany('App\Models\Platillo','orden_tiene_platillos', 'idorden','idplatillo')->withPivot('cantidad','total');
	}
	public function personal(){
		return $this->hasOne('App\Models\Personal','id','idpersonal');
	}
	public function ventas(){
		return $this->belongsToMany('App\Models\Venta','venta_tiene_ordenes', 'idorden','idventa');
	}
	public function getPlatilloCountAttribute(){
		return $this->belongsToMany('App\Models\Platillo','orden_tiene_platillos', 'idorden','idplatillo')->sum('cantidad');
		/*return $this->sum('cantidad');*/
	}
	public function getPlatilloTotalAttribute(){
		return $this->belongsToMany('App\Models\Platillo','orden_tiene_platillos', 'idorden','idplatillo')->sum('total');
		/*return $this->sum('cantidad');*/
	}
	public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('Y-m-d'); //Change the format to whichever you desire
    }

}