<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcategoriasTable extends Migration {

	public function up()
	{
		Schema::create('subcategorias', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 70)->unique();
			$table->integer('idcategoria')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('subcategorias');
	}
}