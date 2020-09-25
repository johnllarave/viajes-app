<?php

use Illuminate\Database\Seeder;
use App\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'nombre' => 'Creado'
	    ]);
	    State::create([
            'nombre' => 'Cotizado'
	    ]);
	    State::create([
            'nombre' => 'Autorizado viajero'
	    ]);
	    State::create([
            'nombre' => 'Autorizado Jefe'
	    ]);
	    State::create([
            'nombre' => 'Finalizado'
	    ]);
	    State::create([
            'nombre' => 'Cancelado'
	    ]);
        State::create([
            'nombre' => 'Rechazado'
        ]);
        State::create([
            'nombre' => 'Comprado'
        ]);
        State::create([
            'nombre' => 'Aprobado'
        ]);
    }
}
