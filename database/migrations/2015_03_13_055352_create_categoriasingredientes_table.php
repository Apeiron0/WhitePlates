<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriasingredientesTable extends Migration {

	public function up()
	{
		Schema::create('categoriasingredientes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 70)->unique();
		});
	}

	public function down()
	{
		Schema::drop('categoriasingredientes');
	}
}