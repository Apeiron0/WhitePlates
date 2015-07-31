<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdenesTable extends Migration {

	public function up()
	{
		Schema::create('ordenes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('comentarios')->nullable();
			$table->boolean('status')->default(0);
			$table->integer('idpersonal')->unsigned();
			/*$table->decimal('total');*/
		});
	}

	public function down()
	{
		Schema::drop('ordenes');
	}
}