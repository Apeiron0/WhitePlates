<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Puesto;
class PuestoTableSeeder extends Seeder {

	public function run()
	{
		

		// Gerente
		Puesto::create(array(
				'nombre' => 'Gerente'
			));

		// Cajero
		Puesto::create(array(
				'nombre' => 'Cajero'
			));

		// Cocina
		Puesto::create(array(
				'nombre' => 'Cocina'
			));

		// Administrador
		Puesto::create(array(
				'nombre' => 'Administrador'
			));

		// Mesero
		Puesto::create(array(
				'nombre' => 'Mesero'
			));

		// EncargadoMeseros
		Puesto::create(array(
				'nombre' => 'Encargado Meseros'
			));
	}
}