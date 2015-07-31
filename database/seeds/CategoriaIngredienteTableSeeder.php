<?php
use Illuminate\Database\Seeder;
use App\Models\CategoriaIngrediente;
class CategoriaIngredienteTableSeeder extends Seeder {
	public function run()
	{
		//1
		CategoriaIngrediente::create(array(
			'nombre' => 'Huevo y lacteos'
		));
		//2
		CategoriaIngrediente::create(array(
			'nombre' => 'Carnes'
		));
		//3
		CategoriaIngrediente::create(array(
			'nombre' => 'Verduras'
		));
		//4
		CategoriaIngrediente::create(array(
			'nombre' => 'Frutas'
		));
		//5
		CategoriaIngrediente::create(array(
			'nombre' => 'Legumbres'
		));
		//6
		CategoriaIngrediente::create(array(
			'nombre' => 'Pastas'
		));
		//7
		CategoriaIngrediente::create(array(
			'nombre' => 'Aceites'
		));
		//8
		CategoriaIngrediente::create(array(
			'nombre' => 'Carnes frias'
		));
		//9
		CategoriaIngrediente::create(array(
			'nombre' => 'Pescados y Mariscos'
		));
		//10
		CategoriaIngrediente::create(array(
			'nombre' => 'Condimentos'
		));
		//11
		CategoriaIngrediente::create(array(
			'nombre' => 'Azucares'
		));
	}
}