<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('RolTableSeeder');
		$this->command->info('Rol table seeded!');
		$this->call('PuestoTableSeeder');
		$this->command->info('Puesto table seeded!');

		$this->call('PersonalTableSeeder');
		$this->command->info('Personal table seeded!');

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');
		
		$this->call('CategoriaTableSeeder');
		$this->command->info('Categoria table seeded!');
			
		$this->call('SubCategoriaTableSeeder');
		$this->command->info('SubCategoria table seeded!');

		$this->call('PlatilloTableSeeder');
		$this->command->info('Platillo table seeded!');

		$this->call('OrdenTableSeeder');
		$this->command->info('Orden table seeded!');

		$this->call('OrdenHasPlatilloTableSeeder');
		$this->command->info('Orden has platillo table seeded!');

		$this->call('CategoriaIngredienteTableSeeder');
		$this->command->info('Categoria seeded');
		
		$this->call('IngredienteTableSeeder');
		$this->command->info('Ingrediente table seeded');

		$this->call('PlatilloHasIngredienteTableSeeder');
		$this->command->info('Platillo tiene Ingrediente table seeded');		

		$this->call('VentaTableSeeder');
		$this->command->info('Venta table seeded');		


		$this->call('VentatieneOrdenTableSeeder');
		$this->command->info('Venta tiene orden table seeded');		
	}
}