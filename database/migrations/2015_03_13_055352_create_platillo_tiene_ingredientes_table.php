<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatilloTieneIngredientesTable extends Migration {

	public function up()
	{
		Schema::create('platillo_tiene_ingredientes', function(Blueprint $table) {
			$table->integer('idplatillo')->unsigned();
			$table->integer('idingrediente')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('platillo_tiene_ingredientes');
	}
}