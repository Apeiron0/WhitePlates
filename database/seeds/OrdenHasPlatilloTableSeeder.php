<?php
use Illuminate\Database\Seeder;
use App\Models\Orden_Platillo;

class OrdenHasPlatilloTableSeeder extends Seeder {
	public function run()
	{
		/*DB::table('roles')->delete();*/
		// Orden1
		//Platillo Mexicano
		Orden_Platillo::create(array(
			'idorden' => '1',
			'idplatillo' => '1',
			'cantidad' =>'2',
			'total' => '146.00'
		));
		//Burritos
		Orden_Platillo::create(array(
			'idorden' => '1',
			'idplatillo' => '2',
			'cantidad' => '3',
			'total' => '189.00'
		));
		//Chilaquiles con Pollo
		Orden_Platillo::create(array(
			'idorden' => '1',
			'idplatillo' => '5',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Frijoles refritos
		Orden_Platillo::create(array(
			'idorden' => '1',
			'idplatillo' => '9',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Orden2
		//Platillo Mexicano
		Orden_Platillo::create(array(
			'idorden' => '2',
			'idplatillo' => '1',
			'cantidad' => '3',
			'total' => '123.00'
		));
		//Tacos de pollo
		Orden_Platillo::create(array(
			'idorden' => '2',
			'idplatillo' => '10',
			'cantidad' => '2',
			'total' => '90.00'
		));
		//Vampiros
		Orden_Platillo::create(array(
			'idorden' => '2',
			'idplatillo' => '11',
			'cantidad' => '1',
			'total' => '45.00'
		));
		//Orden3
		//Sandwich c/jamon y huevo
		Orden_Platillo::create(array(
			'idorden' => '3',
			'idplatillo' => '15',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Huevos tibios
		Orden_Platillo::create(array(
			'idorden' => '3',
			'idplatillo' => '18',
			'cantidad' => '1',
			'total' => '76.00'
		));
		//Orden4
		//Hamburguesa y papas
		Orden_Platillo::create(array(
			'idorden' => '4',
			'idplatillo' => '17',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Vampiros
		Orden_Platillo::create(array(
			'idorden' => '4',
			'idplatillo' => '11',
			'cantidad' => '1',
			'total' => '45.00'
		));
		//Orden5
		//Chilaquiles con Pollo
		Orden_Platillo::create(array(
			'idorden' => '5',
			'idplatillo' => '5',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Frijoles refritos
		Orden_Platillo::create(array(
			'idorden' => '5',
			'idplatillo' => '9',
			'cantidad' => '2',
			'total' => '116.00'
		));
		//Sandwich c/jamon y huevo
		Orden_Platillo::create(array(
			'idorden' => '5',
			'idplatillo' => '15',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Hamburguesa y papas
		Orden_Platillo::create(array(
			'idorden' => '5',
			'idplatillo' => '17',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Vampiros
		Orden_Platillo::create(array(
			'idorden' => '5',
			'idplatillo' => '11',
			'cantidad' => '1',
			'total' => '45.00'
		));
		//Orden6
		//Sandwich c/jamon y huevo
		Orden_Platillo::create(array(
			'idorden' => '6',
			'idplatillo' => '15',
			'cantidad' => '1',
			'total' => '68.00'
		));


		Orden_Platillo::create(array(
			'idorden' => '7',
			'idplatillo' => '1',
			'cantidad' =>'2',
			'total' => '146.00'
		));
		//Burritos
		Orden_Platillo::create(array(
			'idorden' => '7',
			'idplatillo' => '2',
			'cantidad' => '3',
			'total' => '189.00'
		));
		//Chilaquiles con Pollo
		Orden_Platillo::create(array(
			'idorden' => '7',
			'idplatillo' => '5',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Frijoles refritos
		Orden_Platillo::create(array(
			'idorden' => '8',
			'idplatillo' => '9',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Orden2
		//Platillo Mexicano
		Orden_Platillo::create(array(
			'idorden' => '8',
			'idplatillo' => '1',
			'cantidad' => '3',
			'total' => '123.00'
		));
		//Tacos de pollo
		Orden_Platillo::create(array(
			'idorden' => '9',
			'idplatillo' => '10',
			'cantidad' => '2',
			'total' => '90.00'
		));
		//Vampiros
		Orden_Platillo::create(array(
			'idorden' => '9',
			'idplatillo' => '11',
			'cantidad' => '1',
			'total' => '45.00'
		));
		//Orden3
		//Sandwich c/jamon y huevo
		Orden_Platillo::create(array(
			'idorden' => '9',
			'idplatillo' => '15',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Huevos tibios
		Orden_Platillo::create(array(
			'idorden' => '9',
			'idplatillo' => '18',
			'cantidad' => '1',
			'total' => '76.00'
		));
		//Orden4
		//Hamburguesa y papas
		Orden_Platillo::create(array(
			'idorden' => '10',
			'idplatillo' => '17',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Vampiros
		Orden_Platillo::create(array(
			'idorden' => '10',
			'idplatillo' => '11',
			'cantidad' => '1',
			'total' => '45.00'
		));
		//Orden5
		//Chilaquiles con Pollo
		Orden_Platillo::create(array(
			'idorden' => '11',
			'idplatillo' => '5',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Frijoles refritos
		Orden_Platillo::create(array(
			'idorden' => '12',
			'idplatillo' => '9',
			'cantidad' => '2',
			'total' => '116.00'
		));
		//Sandwich c/jamon y huevo
		Orden_Platillo::create(array(
			'idorden' => '13',
			'idplatillo' => '15',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Hamburguesa y papas
		Orden_Platillo::create(array(
			'idorden' => '13',
			'idplatillo' => '17',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Vampiros
		Orden_Platillo::create(array(
			'idorden' => '13',
			'idplatillo' => '11',
			'cantidad' => '1',
			'total' => '45.00'
		));
		//Orden6
		//Sandwich c/jamon y huevo
		Orden_Platillo::create(array(
			'idorden' => '13',
			'idplatillo' => '15',
			'cantidad' => '1',
			'total' => '68.00'
		));
		Orden_Platillo::create(array(
			'idorden' => '14',
			'idplatillo' => '1',
			'cantidad' =>'2',
			'total' => '146.00'
		));
		//Burritos
		Orden_Platillo::create(array(
			'idorden' => '15',
			'idplatillo' => '2',
			'cantidad' => '3',
			'total' => '189.00'
		));
		//Chilaquiles con Pollo
		Orden_Platillo::create(array(
			'idorden' => '15',
			'idplatillo' => '5',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Frijoles refritos
		Orden_Platillo::create(array(
			'idorden' => '16',
			'idplatillo' => '9',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Orden2
		//Platillo Mexicano
		Orden_Platillo::create(array(
			'idorden' => '16',
			'idplatillo' => '1',
			'cantidad' => '3',
			'total' => '123.00'
		));
		//Tacos de pollo
		Orden_Platillo::create(array(
			'idorden' => '16',
			'idplatillo' => '10',
			'cantidad' => '2',
			'total' => '90.00'
		));
		//Vampiros
		Orden_Platillo::create(array(
			'idorden' => '17',
			'idplatillo' => '11',
			'cantidad' => '1',
			'total' => '45.00'
		));
		//Orden3
		//Sandwich c/jamon y huevo
		Orden_Platillo::create(array(
			'idorden' => '17',
			'idplatillo' => '15',
			'cantidad' => '1',
			'total' => '68.00'
		));
		//Huevos tibios
		Orden_Platillo::create(array(
			'idorden' => '18',
			'idplatillo' => '18',
			'cantidad' => '1',
			'total' => '76.00'
		));
		//Orden4
		//Hamburguesa y papas
		Orden_Platillo::create(array(
			'idorden' => '18',
			'idplatillo' => '17',
			'cantidad' => '1',
			'total' => '68.00'
		));
		// //Vampiros
		Orden_Platillo::create(array(
			'idorden' => '19',
			'idplatillo' => '11',
			'cantidad' => '1',
			'total' => '45.00'
		));
		//Orden5
		//Chilaquiles con Pollo
		Orden_Platillo::create(array(
			'idorden' => '19',
			'idplatillo' => '5',
			'cantidad' => '1',
			'total' => '58.00'
		));
		//Frijoles refritos
		Orden_Platillo::create(array(
			'idorden' => '19',
			'idplatillo' => '9',
			'cantidad' => '2',
			'total' => '116.00'
		));

	}
}