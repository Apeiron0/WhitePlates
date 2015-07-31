<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalTable extends Migration {

	public function up()
	{
		Schema::create('personal', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 100);
			$table->string('apaterno', 100);
			$table->string('amaterno', 100);
			$table->date('fechanac');
			$table->string('telefono', 40)->nullable();
			$table->integer('puesto_id')->unsigned();
			$table->string('sexo', 5);
		});
	}

	public function down()
	{
		Schema::drop('personal');
	}
}