<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'nombre' => 'Admin'
        ]);
        Role::create([
        	'nombre' => 'Gestor'
        ]);
        Role::create([
        	'nombre' => 'Asis_compras'
        ]);
        Role::create([
        	'nombre' => 'Compras'
        ]);
    }
}
