<?php
use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(array(
				'username' => 'gerente',
				'password' => Hash::make('gerente123'),
				'active' => '1',
				'roles_id' => '1',
				'personal_id' => '1'
			));

		// UsuarioCajero
		User::create(array(
				'username' => 'cajero',
				'password' => Hash::make('cajero123'),
				'active' => '1',
				'roles_id' => '2',
				'personal_id' => '2'
			));

		// UsuarioCocina
		User::create(array(
				'username' => 'Cocina',
				'password' => Hash::make('cocina123'),
				'active' => '1',
				'roles_id' => '3',
				'personal_id' => '3'
			));

		// UsuarioAdmin
		User::create(array(
				'username' => 'admin',
				'password' => Hash::make('admin123'),
				'active' => '1',
				'roles_id' => '4',
				'personal_id' => '4'
			));

		// UsuarioMesero
		User::create(array(
				'username' => 'mesero',
				'password' => Hash::make('mesero123'),
				'active' => '1',
				'roles_id' => '5',
				'personal_id' => '5'
			));

		// UsuarioMeseros
		User::create(array(
				'username' => 'meseros',
				'password' => Hash::make('meseros123'),
				'active' => '1',
				'roles_id' => '6',
				'personal_id' => '6'
			));
	}
}