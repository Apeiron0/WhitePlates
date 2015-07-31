<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatillosTable extends Migration {

	public function up()
	{
		Schema::create('platillos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->decimal('precio');
			$table->string('nombre', 70)->unique();
			$table->integer('idsubcategoria')->unsigned();
			$table->text('descripcion')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('platillos');
	}
}