<?php
use Illuminate\Database\Seeder;
use App\Models\SubCategoria;
class SubCategoriaTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('subcategorias')->delete();

		// SubCategoria11
		SubCategoria::create(array(
				'nombre' => 'Antojitos',
				'idcategoria' => 1
			));

		// SubCategoria12
		SubCategoria::create(array(
				'nombre' => 'Huevos',
				'idcategoria' => 1
			));

		// SubCategoria21
		SubCategoria::create(array(
				'nombre' => 'Vinos y Cervezas',
				'idcategoria' => 2
			));
		
		SubCategoria::create(array(
				'nombre' => 'Bebidas',
				'idcategoria' => 2
			));

				SubCategoria::create(array(
				'nombre' => 'Entrada',
				'idcategoria' => 1
			));
		
		SubCategoria::create(array(
				'nombre' => 'Para botanear',
				'idcategoria' => 1
			));
		SubCategoria::create(array(
				'nombre' => 'Ensaladas',
				'idcategoria' => 1
			));
		
		SubCategoria::create(array(
				'nombre' => 'Sopas y Pastas',
				'idcategoria' => 1
			));
		

		SubCategoria::create(array(
				'nombre' => 'Pescados',
				'idcategoria' => 1
			));
		
		SubCategoria::create(array(
				'nombre' => 'Pollo',
				'idcategoria' => 1
			));
		SubCategoria::create(array(
				'nombre' => 'Desayunos',
				'idcategoria' => 1
			));
		
		SubCategoria::create(array(
				'nombre' => 'Carnes',
				'idcategoria' => 1
			));
		
		SubCategoria::create(array(
				'nombre' => 'Cortes',
				'idcategoria' => 1
			));
		SubCategoria::create(array(
				'nombre' => 'Sandwiches y Hamburguesas',
				'idcategoria' => 1
			));
		
		SubCategoria::create(array(
				'nombre' => 'Postres',
				'idcategoria' => 1
			));
	}
}