<?php
use Illuminate\Database\Seeder;
use App\Models\Platillo;
class PlatilloTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('platillos')->delete();

				// Platillo1
		Platillo::create(array(
				'precio' => 73,
				'nombre' => 'Platillo mexicano',
				'idsubcategoria' => 1,
				'descripcion' => 'Chuleta de puerco, taco de pollo'
			));

		// Platillo 2
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Burritos',
				'idsubcategoria' => 1,
				'descripcion' => '3 piezas'
			));
			//platillo 3
		Platillo::create(array(
				'precio' => 73,
				'nombre' => 'Enchilada huastecas',
				'idsubcategoria' => 1,
				'descripcion' => 'Bistec de aguayon, dos enchiladas rancheras'
			));
		//platillo 4
		Platillo::create(array(
				'precio' => 64,
				'nombre' => 'Enchiladas',
				'idsubcategoria' => 1,
				'descripcion' => '4 piezas'
			));
		//platillo 5
		Platillo::create(array(
				'precio' => 58,
				'nombre' => 'Chilaquiles con pollo',
				'idsubcategoria' => 1,
				'descripcion' => ''
			));
		//platillo 6
		Platillo::create(array(
				'precio' => 53,
				'nombre' => 'Tostadas tapatias',
				'idsubcategoria' => 1,
				'descripcion' => '3 piezas'
			));
		//platillo 7
		Platillo::create(array(
				'precio' => 53,
				'nombre' => 'Quesadillas',
				'idsubcategoria' => 1,
				'descripcion' => '3 piezas'
			));
		//platillo 8
		Platillo::create(array(
				'precio' => 56,
				'nombre' => 'Sincronizadas',
				'idsubcategoria' => 1,
				'descripcion' => '3 piezas'
			));
		//platillo 9
		Platillo::create(array(
				'precio' => 29,
				'nombre' => 'Frijoles refritos',
				'idsubcategoria' => 1,
				'descripcion' => ''
			));
		//platillo 10
		Platillo::create(array(
				'precio' => 50,
				'nombre' => 'Tacos de pollo',
				'idsubcategoria' => 1,
				'descripcion' => '4 piezas'
			));
		//platillo 11
		Platillo::create(array(
				'precio' => 70,
				'nombre' => 'Vampiros',
				'idsubcategoria' => 1,
				'descripcion' => 'Acompañado con salsa verde y pico de gallo'
			));
		//platillo 12
		Platillo::create(array(
				'precio' => 53,
				'nombre' => 'Chiles rellenos de queso',
				'idsubcategoria' => 1,
				'descripcion' => 'Con Frijoles Refrito y Enchilada de Lechuga'
			));
		//platillo 13
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Flautas de pollo',
				'idsubcategoria' => 1,
				'descripcion' => '4 piezas'
			));
		//platillo 14
		Platillo::create(array(
				'precio' => 65,
				'nombre' => 'Club sandwich',
				'idsubcategoria' => 14,
				'descripcion' => ''
			));
		//platillo 15
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Sandwich c/jamon y huevo',
				'idsubcategoria' => 14,
				'descripcion' => ''
			));
		//platillo 16
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Sandwich c/jamon y queso',
				'idsubcategoria' => 14,
				'descripcion' => ''
			));
		//platillo 17
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Hamburguesa con papas',
				'idsubcategoria' => 14,
				'descripcion' => 'Hamburguesa con queso y acompañado con papas francesa'
			));
		//platillo 18
		Platillo::create(array(
				'precio' => 30,
				'nombre' => ' Huevos tibios',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));
		//platillo 19

		Platillo::create(array(
				'precio' => 53,
				'nombre' => ' Huevos fritos',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));
		//platillo 20

		Platillo::create(array(
				'precio' => 53,
				'nombre' => 'Huevos rancheros ',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));
		//platillo 21
		Platillo::create(array(
				'precio' => 53,
				'nombre' => 'Huevo Revueltos',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));
		//platillo 22
		Platillo::create(array(
				'precio' => 55,
				'nombre' => 'Huevo c/jamon y tocino',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));
		//platillo 23
		Platillo::create(array(
				'precio' => 63,
				'nombre' => ' Omelete con jamon ',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));
		//platillo 24
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Omelete con champiñones',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));
		//platillo 25
		Platillo::create(array(
				'precio' => 53,
				'nombre' => 'Tortilla a la española',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));

		//platillo 26
		Platillo::create(array(
				'precio' => 65,
				'nombre' => 'Machacado c/huevo',
				'idsubcategoria' => 2,
				'descripcion' => ''
			));
		//platillo 27
		Platillo::create(array(
				'precio' => 25,
				'nombre' => 'Leche en vaso',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 28
		Platillo::create(array(
				'precio' => 30,
				'nombre' => 'Capuchino',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 29

		Platillo::create(array(
				'precio' => 30,
				'nombre' => 'Express',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 29
		Platillo::create(array(
				'precio' => 30,
				'nombre' => 'Cafe americano',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 30
		Platillo::create(array(
				'precio' => 30,
				'nombre' => 'Cafe c/leche en taza',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 31
		Platillo::create(array(
				'precio' => 30,
				'nombre' => 'Descafeinados',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 31
		Platillo::create(array(
				'precio' => 25,
				'nombre' => 'Chocolate',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 32
		Platillo::create(array(
				'precio' => 22,
				'nombre' => 'Té de manzanilla ',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 33
		Platillo::create(array(
				'precio' => 22,
				'nombre' => 'Té verde',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 34
		Platillo::create(array(
				'precio' => 22,
				'nombre' => 'Agua de horchata',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 35
		Platillo::create(array(
				'precio' => 22,
				'nombre' => 'Agua de jamaica',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 36
		Platillo::create(array(
				'precio' => 22,
				'nombre' => 'Limonada',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 37
		Platillo::create(array(
				'precio' => 22,
				'nombre' => 'Refresco',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 38
		Platillo::create(array(
				'precio' => 28,
				'nombre' => 'Sangría',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 39
		Platillo::create(array(
				'precio' => 20,
				'nombre' => 'Agua purificada',
				'idsubcategoria' => 4,
				'descripcion' => ''
			));
		//platillo 40
		Platillo::create(array(
				'precio' => 43,
				'nombre' => 'Copa de vino blanco',
				'idsubcategoria' => 3,
				'descripcion' => 'Vino Blanco'
			));
		//platillo 41
		Platillo::create(array(
				'precio' => 43,
				'nombre' => 'Copa de vino tinto',
				'idsubcategoria' => 3,
				'descripcion' => 'Vino Tinto'
			));
		//platillo 42
		Platillo::create(array(
				'precio' => 43,
				'nombre' => 'Cerveza Carta blanca',
				'idsubcategoria' => 3,
				'descripcion' => ''
			));
		//platillo 43
		Platillo::create(array(
				'precio' => 43,
				'nombre' => 'Cerveza Sol',
				'idsubcategoria' => 3,
				'descripcion' => ''
			));
		//platillo 44
		Platillo::create(array(
				'precio' => 43,
				'nombre' => 'Cerveza XX Lager',
				'idsubcategoria' => 3,
				'descripcion' => ''
			));
		//platillo 45
		Platillo::create(array(
				'precio' => 43,
				'nombre' => 'Cerveza Bohemia',
				'idsubcategoria' => 3,
				'descripcion' => ''
			));
		//platillo 46
		Platillo::create(array(
				'precio' => 43,
				'nombre' => 'Cerveza Tecate Rojo',
				'idsubcategoria' => 3,
				'descripcion' => ''
			));
		//platillo 47
		Platillo::create(array(
				'precio' => 22,
				'nombre' => 'Cervaza Tecate Light',
				'idsubcategoria' => 3,
				'descripcion' => ''
			));
		//platillo 48
		Platillo::create(array(
				'precio' => 43,
				'nombre' => 'Cerveza Indio',
				'idsubcategoria' => 3,
				'descripcion' => ''
			));
		//platillo 49
		Platillo::create(array(
				'precio' => 34,
				'nombre' => 'Pay de queso',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 50
		Platillo::create(array(
				'precio' => 34,
				'nombre' => 'Pay de manzana',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 51
		Platillo::create(array(
				'precio' => 37,
				'nombre' => 'Pastel de chocolate',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 52
		Platillo::create(array(
				'precio' => 37,
				'nombre' => 'Pastel de tres leches',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 53
		Platillo::create(array(
				'precio' => 36,
				'nombre' => 'Durazno con crema',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 54
		Platillo::create(array(
				'precio' => 37,
				'nombre' => 'Flan',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 55
		Platillo::create(array(
				'precio' => 21,
				'nombre' => 'Helado 1 bola',
				'idsubcategoria' => 15,
				'descripcion' => '1 Bola'
			));
		//platillo 56
		Platillo::create(array(
				'precio' => 28,
				'nombre' => 'Helado 2 bolas',
				'idsubcategoria' => 15,
				'descripcion' => '2 Bola'
			));
		//platillo 57
		Platillo::create(array(
				'precio' => 38,
				'nombre' => 'Postre Tres Marias',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 58
		Platillo::create(array(
				'precio' => 38,
				'nombre' => 'Banana split',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 59
		Platillo::create(array(
				'precio' => 38,
				'nombre' => 'Malteada',
				'idsubcategoria' => 15,
				'descripcion' => ''
			));
		//platillo 60
		Platillo::create(array(
				'precio' => 44,
				'nombre' => 'Cotel de camarones',
				'idsubcategoria' => 5,
				'descripcion' => ''
			));
		//platillo 61
		Platillo::create(array(
				'precio' => 49,
				'nombre' => 'Cotel de ostiones',
				'idsubcategoria' => 5,
				'descripcion' => ''
			));
		//platillo 62
		Platillo::create(array(
				'precio' => 30,
				'nombre' => 'Campechana',
				'idsubcategoria' => 5,
				'descripcion' => ''
			));
		//platillo 63
		Platillo::create(array(
				'precio' => 35,
				'nombre' => 'Cotel de aguacate',
				'idsubcategoria' => 5,
				'descripcion' => ''
			));
		//platillo 64
		Platillo::create(array(
				'precio' => 30,
				'nombre' => 'Cotel de frutas',
				'idsubcategoria' => 5,
				'descripcion' => ''
			));
		//platillo 65
		Platillo::create(array(
				'precio' => 106,
				'nombre' => 'Jamon Serrano',
				'idsubcategoria' => 5,
				'descripcion' => ''
			));
		//platillo 66
		Platillo::create(array(
				'precio' => 35,
				'nombre' => 'Orden de papas',
				'idsubcategoria' => 6,
				'descripcion' => 'Papas fritas'
			));//platillo 67
		Platillo::create(array(
				'precio' => 60,
				'nombre' => 'Asadero fundido c/chorizo ',
				'idsubcategoria' => 6,
				'descripcion' => ''
			));
		//platillo 68
		Platillo::create(array(
				'precio' => 60,
				'nombre' => 'Asadero fundido c/rajas',
				'idsubcategoria' => 6,
				'descripcion' => ''
			));
		//platillo 69


		Platillo::create(array(
				'precio' => 54,
				'nombre' => 'Ensalada hawaiana',
				'idsubcategoria' => 7,
				'descripcion' => 'Lechugas,Mixtas,Mango,Fresa,Jicama,Nuez,Queso Panela'
			));

		//platillo 70
		Platillo::create(array(
				'precio' => 54,
				'nombre' => 'Ensalada griega',
				'idsubcategoria' => 7,
				'descripcion' => 'Lechugas, mixtas, espinacas, pepinos'
			));
		//platillo 71
		Platillo::create(array(
				'precio' => 54,
				'nombre' => 'Ensalada Santa Fe',
				'idsubcategoria' => 7,
				'descripcion' => 'Lechugas, mixtas, aguacate, pico de gallo'
			));
		//platillo 72
		Platillo::create(array(
				'precio' => 76,
				'nombre' => 'Ensalada de pollo',
				'idsubcategoria' => 7,
				'descripcion' => 'Pechuga a la plancha y lechugas mixtas'
			));
		//platillo 73
		Platillo::create(array(
				'precio' => 76,
				'nombre' => 'Ensalada de atún',
				'idsubcategoria' => 7,
				'descripcion' => ''
			));
		//platillo 74
		Platillo::create(array(
				'precio' => 76,
				'nombre' => 'Ensalada de frutas',
				'idsubcategoria' => 7,
				'descripcion' => ''
			));
		//platillo 75
		Platillo::create(array(
				'precio' => 76,
				'nombre' => 'Hoja de parra c/Jocoque',
				'idsubcategoria' => 7,
				'descripcion' => ''
			));
		//platillo 76
		Platillo::create(array(
				'precio' => 57,
				'nombre' => 'Sopa de pescado',
				'idsubcategoria' => 8,
				'descripcion' => ''
			));
		//platillo 77
		Platillo::create(array(
				'precio' => 53,
				'nombre' => 'sopa de pollo especial',
				'idsubcategoria' => 8,
				'descripcion' => ''
			));
		//platillo 78
		Platillo::create(array(
				'precio' => 53,
				'nombre' => 'Sopa de ajo c/huevos',
				'idsubcategoria' => 8,
				'descripcion' => ''
			));
		//platillo 79

		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Caldo tlalpeño',
				'idsubcategoria' => 8,
				'descripcion' => ''
			));
		//platillo 80
		Platillo::create(array(
				'precio' => 66,
				'nombre' => 'Caldo largo d/mariscos',
				'idsubcategoria' => 8,
				'descripcion' => 'Filete de pescado, ostion y camaron'
			));
		//platillo 81
		Platillo::create(array(
				'precio' => 44,
				'nombre' => 'Crema de Elotes',
				'idsubcategoria' => 8,
				'descripcion' => 'Crema con elotes, esparragos y champiñones'
			));
		//platillo 82
		Platillo::create(array(
				'precio' => 61,
				'nombre' => 'Espaguetti a la italiana',
				'idsubcategoria' => 8,
				'descripcion' => ''
			));
		//platillo 83
		Platillo::create(array(
				'precio' => 61,
				'nombre' => 'Espaguetti a la bolonesa',
				'idsubcategoria' => 8,
				'descripcion' => 'Salsa de tomate con carne molida'
			));
		//platillo 84
		Platillo::create(array(
				'precio' => 50,
				'nombre' => 'Pescado empanizado',
				'idsubcategoria' => 9,
				'descripcion' => 'Acompañado de ensalada de Lechugas Mixtas'
			));
		//platillo 85
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Pescado manier',
				'idsubcategoria' => 9,
				'descripcion' => 'Preparado a la mantequilla y acompañado de pure de papa'
			));
		//platillo 86
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Pescado al horno',
				'idsubcategoria' => 9,
				'descripcion' => 'Acompañado de pure de papa y chile huajillo'
			));
		//platillo 87
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Pollo en mole',
				'idsubcategoria' => 10,
				'descripcion' => 'Acompañado de Frijoles Refritos'
			));
		//platillo 88
		Platillo::create(array(
				'precio' => 57,
				'nombre' => 'Pollo c/salsa Teriyaky',
				'idsubcategoria' => 10,
				'descripcion' => 'Acompañado de pure de Papa'
			));
		//platillo 89
		Platillo::create(array(
				'precio' => 57,
				'nombre' => 'Pechuga empanizada',
				'idsubcategoria' => 10,
				'descripcion' => 'Acompañada de papas a la francesa'
			));
		//platillo 90
		Platillo::create(array(
				'precio' => 57,
				'nombre' => 'Pan dulce',
				'idsubcategoria' => 11,
				'descripcion' => 'pan de avena, platano, empanadas'
			));
		//platillo 91
		Platillo::create(array(
				'precio' => 57,
				'nombre' => 'Hot Cakes',
				'idsubcategoria' => 11,
				'descripcion' => 'Con mantequilla, miel,mermelada'
			));
		//Platillo 92
		Platillo::create(array(
				'precio' => 63,
				'nombre' => 'Flautas de carne',
				'idsubcategoria' => 1,
				'descripcion' => '4 piezas, carne deshebrada'
			));
	}
}