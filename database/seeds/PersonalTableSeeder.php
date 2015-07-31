<?php
use Illuminate\Database\Seeder;
use App\Models\Personal;
class PersonalTableSeeder extends Seeder {

	public function run()
	{
		/*DB::table('personal')->delete();*/

		// PersonalGerente
		Personal::create(array(
				'nombre' => 'Daniel',
				'apaterno' => 'Alejandro',
				'amaterno' => 'Gómez',
				'fechanac' => '1995-02-02',
				'telefono' => '7-32-67-54',
				'puesto_id' => '1',
				'sexo' => 'M'
			));

		// PersonalCajero
		Personal::create(array(
				'nombre' => 'Erick Alexis',
				'apaterno' => 'Reza',
				'amaterno' => 'Sanchez',
				'fechanac' => '1995-02-02',
				'telefono' => '7-89-22-42',
				'puesto_id' => '2',
				'sexo' => 'F'
			));

		// PersonalCocina
		Personal::create(array(
				'nombre' => 'Chrs',
				'apaterno' => 'Reyes',
				'amaterno' => 'Lopez',
				'fechanac' => '1995-02-02',
				'telefono' => '',
				'puesto_id' => '3',
				'sexo' => 'M'
			));

		// PersonalAdmin
		Personal::create(array(
				'nombre' => 'Víctor',
				'apaterno' => 'Martínez',
				'amaterno' => 'Sanchez',
				'fechanac' => '1995-02-02',
				'telefono' => '71628762',
				'puesto_id' => '4'
			));

		// PersonalMesero
		Personal::create(array(
				'nombre' => 'Beatriz',
				'apaterno' => 'Carmona',
				'amaterno' => 'Ramirez',
				'fechanac' => '1995-02-02',
				'telefono' => '78126872',
				'puesto_id' => '5',
				'sexo' => 'F'
			));

		// PersonalMeseros
		Personal::create(array(
				'nombre' => 'Alexa',
				'apaterno' => 'Rodriguez',
				'amaterno' => 'Becerra',
				'fechanac' => '1995-02-02',
				'telefono' => '71628762',
				'puesto_id' => '6',
				'sexo' => 'F'
			));

		Personal::create(array(
				'nombre' => 'Hector',
				'apaterno' => 'Camacho',
				'amaterno' => 'Favela',
				'fechanac' => '1995-02-02',
				'telefono' => '33333',
				'puesto_id' => '5',
				'sexo' => 'F'
			));
		Personal::create(array(
				'nombre' => 'Pamela',
				'apaterno' => 'Nuñez',
				'amaterno' => 'Garcia',
				'fechanac' => '1994-02-02',
				'telefono' => '87111355288',
				'puesto_id' => '2',
				'sexo' => 'F'
			));
			Personal::create(array(
				'nombre' => 'Brenda',
				'apaterno' => 'Martell',
				'amaterno' => 'Medina',
				'fechanac' => '1994-02-02',
				'telefono' => '78687',
				'puesto_id' => '5',
				'sexo' => 'F'
			));
				Personal::create(array(
				'nombre' => 'Damaris',
				'apaterno' => 'Garcia',
				'amaterno' => 'Lomas',
				'fechanac' => '1994-02-02',
				'telefono' => '8979823',
				'puesto_id' => '1',
				'sexo' => 'F'
			));
				Personal::create(array(
				'nombre' => 'Wendy',
				'apaterno' => 'Resendiz',
				'amaterno' => 'Castorena',
				'fechanac' => '1994-02-02',
				'telefono' => '1380',
				'puesto_id' => '5',
				'sexo' => 'F'
			));


	}
}