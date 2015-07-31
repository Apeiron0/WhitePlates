<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
class ReportesController extends Controller {

	public function postReportespordia(){
		$toda= Carbon::now()->toDateString;
		return $toda;
	}
	public function postPorano(Request $request){
		$fe=$request->get('fecha');

		return DB::select(DB::raw("SELECT
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '01' AND YEAR(ventas.fecha)='$fe') 'Enero',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '02' AND YEAR(ventas.fecha)='$fe') 'Febrero',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '03' AND YEAR(ventas.fecha)='$fe') 'Marzo',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '04' AND YEAR(ventas.fecha)='$fe') 'Abril',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '05' AND YEAR(ventas.fecha)='$fe') 'Mayo',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '06' AND YEAR(ventas.fecha)='$fe') 'Junio',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '07' AND YEAR(ventas.fecha)='$fe') 'Julio',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '08' AND YEAR(ventas.fecha)='$fe') 'Agosto',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '09' AND YEAR(ventas.fecha)='$fe') 'Septiembre',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '10' AND YEAR(ventas.fecha)='$fe') 'Octubre',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '11' AND YEAR(ventas.fecha)='$fe') 'Noviembre',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '12' AND YEAR(ventas.fecha)='$fe') 'Diciembre'
		FROM
		ventas
		WHERE
		YEAR(ventas.fecha)='$fe'
		LIMIT 1"));
		
	}
	public function postTotalplatillos(Request $request){
		$fecha1=$request->get('fecha1');
		$fecha2=$request->get('fecha2');
		
		return DB::select(DB::raw("SELECT nombre,
		sum(cantidad) as 'Cantidad'
		from (((pruebacopadeleche.platillos inner join pruebacopadeleche.orden_tiene_platillos on platillos.id=orden_tiene_platillos.idplatillo)inner join ordenes on orden_tiene_platillos.idorden=ordenes.id) inner join venta_tiene_ordenes on ordenes.id=venta_tiene_ordenes.idorden)
		inner join ventas on venta_tiene_ordenes.idventa=ventas.id
		where DATE(fecha) between '$fecha1' and '$fecha2'
		group by nombre
		order by Cantidad;"));
	}
	public function postTotalgananciameseroocajero(Request $request){
		$fecha1=$request->get('fecha1');
		$fecha2=$request->get('fecha2');
		
		return DB::select(DB::raw("SELECT personal.id,personal.nombre, sum(ventas.total) as 'Vendido' from (((personal inner join puestos on personal.puesto_id=puestos.id)
		inner join ordenes on personal.id=ordenes.idpersonal) inner join venta_tiene_ordenes
		on ordenes.id=venta_tiene_ordenes.idorden) inner join ventas on venta_tiene_ordenes.idventa=ventas.id
		where puestos.nombre='Mesero' and fecha between '$fecha1' and '$fecha2'
		group by personal.id;"));
	}
	

}
