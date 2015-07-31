<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentasTable extends Migration {

	public function up()
	{
		Schema::create('ventas', function(Blueprint $table) {
			$table->increments('id');
			$table->date('fecha');
			$table->decimal('total');
			/*$table->boolean('status')->default(0);*/
			$table->integer('personal_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ventas');
	}
}