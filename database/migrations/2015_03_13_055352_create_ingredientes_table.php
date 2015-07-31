<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIngredientesTable extends Migration {

	public function up()
	{
		Schema::create('ingredientes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 70)->unique();
			$table->integer('idcategoriaingrediente')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ingredientes');
	}
}