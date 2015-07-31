<?php
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolTableSeeder extends Seeder {

	public function run()
	{
		/*DB::table('roles')->delete();*/

		// Gerente
		Rol::create(array(
				'tipo' => 'Gerente'
			));

		// Cajero
		Rol::create(array(
				'tipo' => 'Cajero'
			));

		// Cocina
		Rol::create(array(
				'tipo' => 'Cocina'
			));

		// Administrador
		Rol::create(array(
				'tipo' => 'Administrador'
			));

		// Mesero
		Rol::create(array(
				'tipo' => 'Mesero'
			));

		// Meseros
		Rol::create(array(
				'tipo' => 'Departamento Meseros'
			));
	}
}