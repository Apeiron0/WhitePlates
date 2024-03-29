<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePuestosTable extends Migration {

	public function up()
	{
		Schema::create('puestos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 50)->unique();
		});
	}

	public function down()
	{
		Schema::drop('puestos');
	}
}