<?php
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriaTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('categorias')->delete();

		// CategoriaPlatillo
		Categoria::create(array(
				'nombre' => 'Platillos'
			));

		// CategoriaBebida
		Categoria::create(array(
				'nombre' => 'Bebidas'
			));
	}
}