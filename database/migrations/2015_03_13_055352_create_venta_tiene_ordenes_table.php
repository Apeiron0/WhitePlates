<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentaTieneOrdenesTable extends Migration {

	public function up()
	{
		Schema::create('venta_tiene_ordenes', function(Blueprint $table) {
			$table->integer('idventa')->unsigned();
			$table->integer('idorden')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('venta_tiene_ordenes');
	}
}