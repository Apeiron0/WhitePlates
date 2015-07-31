<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->timestamps();
			$table->increments('id');
			$table->string('username', 80)->unique();
			$table->string('password', 69);
			$table->rememberToken('rememberToken');
			$table->boolean('active')->default(1);
			$table->integer('roles_id')->unsigned();
			$table->integer('personal_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}