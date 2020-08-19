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
            'email' => 'prueba@prueba.com',
            'cod_sap' => '70951',
            'ceco' => '7320CC',
	        'jefe' => '1',
            'password' => bcrypt('123123'),
	        'role_id' => '1'
	    ]);
        User::create([
            'name' => 'Leonardo',
            'last_name' => 'Vargas',
            'email' => 'prueba@grupo-sm.com',
            'cod_sap' => '10985',
            'ceco' => '6510CE',
            'jefe' => '1',
            'password' => bcrypt('123123'),
            'role_id' => '2'
        ]);
    }
}
