<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdenTienePlatillosTable extends Migration {

	public function up()
	{
		Schema::create('orden_tiene_platillos', function(Blueprint $table) {
			$table->integer('idorden')->unsigned();
			$table->integer('idplatillo')->unsigned();
			$table->integer('cantidad')->unsigned()->default('1');
			$table->decimal('total');
		});
	}

	public function down()
	{
		Schema::drop('orden_tiene_platillos');
	}
}