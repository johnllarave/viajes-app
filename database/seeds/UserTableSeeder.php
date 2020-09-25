<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Alexander',
            'last_name' => 'Llarave Herrán',
            'documento' => '1024505008',
            'telefono' => '3211234567',
            'area' => 'Tecnologia',
            'empresa' => 'Comercializadora',
	    	'cargo' => 'Responsable Tecnico de aplicaciones empresariales',
            'email' => 'john.llarave@grupo-sm.com',
            'cod_sap' => '70951',
            'ceco' => '7320CC',
	        'jefe' => '1',
            'password' => bcrypt('123123'),
	        'role_id' => '1'
	    ]);
        User::create([
            'name' => 'Leonardo',
            'last_name' => 'Vargas',
            'documento' => '775617',
            'telefono' => '3211234567',
            'area' => 'Compras',
            'empresa' => 'Comercializadora',
            'cargo' => 'Gerente de compras y tecnoloia',
            'email' => 'leonardo.vargas@grupo-sm.com',
            'cod_sap' => '10985',
            'ceco' => '6510CE',
            'jefe' => '1',
            'password' => bcrypt('123123'),
            'role_id' => '2'
        ]);
        User::create([
            'name' => 'Robinson Estiven',
            'last_name' => 'Velasquez Sanches',
            'documento' => '1106892158',
            'telefono' => '3164742470',
            'area' => 'Tecnologia',
            'cargo' => 'Responsable de soporte y mantenimiento',
            'email' => 'robinson.velasquez@grupo-sm.com',
            'cod_sap' => '70920',
            'ceco' => '7320CC',
            'jefe' => '2',
            'password' => bcrypt('123123'),
            'role_id' => '2'
        ]);
    }
}
