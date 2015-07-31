<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('roles_id')->references('id')->on('roles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('personal_id')->references('id')->on('personal')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('personal', function(Blueprint $table) {
			$table->foreign('puesto_id')->references('id')->on('puestos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ordenes', function(Blueprint $table) {
			$table->foreign('idpersonal')->references('id')->on('personal')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('platillos', function(Blueprint $table) {
			$table->foreign('idsubcategoria')->references('id')->on('subcategorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('subcategorias', function(Blueprint $table) {
			$table->foreign('idcategoria')->references('id')->on('categorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ingredientes', function(Blueprint $table) {
			$table->foreign('idcategoriaingrediente')->references('id')->on('categoriasingredientes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('venta_tiene_ordenes', function(Blueprint $table) {
			$table->foreign('idventa')->references('id')->on('ventas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('venta_tiene_ordenes', function(Blueprint $table) {
			$table->foreign('idorden')->references('id')->on('ordenes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orden_tiene_platillos', function(Blueprint $table) {
			$table->foreign('idorden')->references('id')->on('ordenes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orden_tiene_platillos', function(Blueprint $table) {
			$table->foreign('idplatillo')->references('id')->on('platillos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('platillo_tiene_ingredientes', function(Blueprint $table) {
			$table->foreign('idplatillo')->references('id')->on('platillos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('platillo_tiene_ingredientes', function(Blueprint $table) {
			$table->foreign('idingrediente')->references('id')->on('ingredientes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ventas', function(Blueprint $table) {
			$table->foreign('personal_id')->references('id')->on('personal')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_roles_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_personal_id_foreign');
		});
		Schema::table('personal', function(Blueprint $table) {
			$table->dropForeign('personal_puesto_id_foreign');
		});
		Schema::table('ordenes', function(Blueprint $table) {
			$table->dropForeign('ordenes_idpersonal_foreign');
		});
		Schema::table('platillos', function(Blueprint $table) {
			$table->dropForeign('platillos_idsubcategoria_foreign');
		});
		Schema::table('subcategorias', function(Blueprint $table) {
			$table->dropForeign('subcategorias_idcategoria_foreign');
		});
		Schema::table('ingredientes', function(Blueprint $table) {
			$table->dropForeign('ingredientes_idcategoriaingrediente_foreign');
		});
		Schema::table('venta_tiene_ordenes', function(Blueprint $table) {
			$table->dropForeign('venta_tiene_ordenes_idventa_foreign');
		});
		Schema::table('venta_tiene_ordenes', function(Blueprint $table) {
			$table->dropForeign('venta_tiene_ordenes_idorden_foreign');
		});
		Schema::table('orden_tiene_platillos', function(Blueprint $table) {
			$table->dropForeign('orden_tiene_platillos_idorden_foreign');
		});
		Schema::table('orden_tiene_platillos', function(Blueprint $table) {
			$table->dropForeign('orden_tiene_platillos_idplatillo_foreign');
		});
		Schema::table('platillo_tiene_ingredientes', function(Blueprint $table) {
			$table->dropForeign('platillo_tiene_ingredientes_idplatillo_foreign');
		});
		Schema::table('platillo_tiene_ingredientes', function(Blueprint $table) {
			$table->dropForeign('platillo_tiene_ingredientes_idingrediente_foreign');
		});
	}
}