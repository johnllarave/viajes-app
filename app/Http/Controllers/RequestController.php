<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Requests;

class RequestController extends Controller
{
    public function index () {
		//$products = Product::paginate(10); //{{$products->links()}}
		//$requests = Requests::all();

    	if (auth()->user()->role_id <> 1) { //Si no es administrador solo visualiza las solicitudes propias
    		$requests = Requests::select('requests.*', 'users.id AS id_user', 'users.name', 'users.last_name', 'states.nombre AS name_state')
									->join('users', 'requests.users_id', '=', 'users.id')
									->join('states', 'requests.state_id', '=', 'states.id')
									->where('users.id', Auth::id()) //Auth::user()->id
									->where('requests.estado', '=', 1)
									->get();
    	} else { // si el usuario es administrador puede visualizar todas las solicitudes
			$requests = Requests::select('requests.*', 'users.id AS id_user', 'users.name', 'users.last_name', 'states.nombre AS name_state')
									->join('users', 'requests.users_id', '=', 'users.id')
									->join('states', 'requests.state_id', '=', 'states.id')
									->where('requests.estado', '=', 1)
									->get();
    	}
		return view('request.index')->with(compact('requests')); //vista del listado de productos
	}

	public function create () {
		return view('request.create'); //Ver formulario de registro
	}

	public function store (Request $request) {
		//Validar datos
		//Personalización de los mensajes de error
		$messages = [
			'tipo_solicitud.required' => 'Debe seleccionar una opción',
			'viaticos.required' => 'Debe seleccionar una opción',
			'justificacion.required' => 'Debe seleccionar una opción',
			'tipo_viaje_1.required' => 'Debe seleccionar una opción',
			'origen_1.required' => 'Debe ingresar el origen',
			'destino_1.required' => 'Debe ingresar el destino',
			'start_1.required' => 'Debe selecionar la fecha',
			'start_1.after_or_equal' => 'La fecha debe ser superior a la actual',
			'hotel_1.required' => 'Debe selecionar una opción',
			'equipaje_1.required' => 'Debe selecionar una opción'
		];

		//Reglas de las validaciones
		$rules = [
			//'fecha' => 'required|after_or_equal:'.date('Y-m-d'),
			'tipo_solicitud' => 'required',
			'viaticos' => 'required',
			'justificacion' => 'required',
			'tipo_viaje_1' => 'required',
			'origen_1' => 'required',
			'destino_1' => 'required',
			'start_1' => 'required|after_or_equal:'.date('Y-m-d'),
			'hotel_1' => 'required',
			'equipaje_1' => 'required'
		];

		//Función para la validación del formulario, recibe 3 parametros
		$this->validate($request, $rules, $messages);

		// Registrar nuevo producto
		//dd($request->all());

		$requests = new Requests();

		$requests->tipo_solicitud = $request->input('tipo_solicitud');
		$requests->viaticos = $request->input('viaticos');
		$requests->justificacion = $request->input('justificacion');
		$requests->tipo_viaje_1 = $request->input('tipo_viaje_1');
		$requests->origen_1 = $request->input('origen_1');
		$requests->destino_1 = $request->input('destino_1');
		$requests->fecha_salida_1 = $request->input('start_1');
		$requests->fecha_retorno_1 = $request->input('end_1');
		$requests->dias_1 = $request->input('dias_1');
		$requests->hotel_1 = $request->input('hotel_1');
		$requests->equipaje_1 = $request->input('equipaje_1');
		$requests->tipo_viaje_2 = $request->input('tipo_viaje_2');
		$requests->origen_2 = $request->input('origen_2');
		$requests->destino_2 = $request->input('destino_2');
		$requests->fecha_salida_2 = $request->input('start_2');
		$requests->fecha_retorno_2 = $request->input('end_2');
		$requests->dias_2 = $request->input('dias_2');
		$requests->hotel_2 = $request->input('hotel_2');
		$requests->equipaje_2 = $request->input('equipaje_2');
		$requests->tipo_viaje_3 = $request->input('tipo_viaje_3');
		$requests->origen_3 = $request->input('origen_3');
		$requests->destino_3 = $request->input('destino_3');
		$requests->fecha_salida_3 = $request->input('start_3');
		$requests->fecha_retorno_3 = $request->input('end_3');
		$requests->dias_3 = $request->input('dias_3');
		$requests->hotel_3 = $request->input('hotel_3');
		$requests->equipaje_3 = $request->input('equipaje_3');
		$requests->observacion = $request->input('observacion');
		$requests->users_id = Auth::id();
		$requests->state_id = 1; //estado del flujo de las autorizaciones
		$requests->save(); //INSERT

		return redirect('/request');
	}

	public function edit ($id) {
		//Si la persona no es la que creo ese campo lo redireciona al home
		$requests = Requests::find($id);
		$valida = Requests::select('users_id', 'state_id')
									->where('requests.id', $id)
									->get()
									->toArray();
		//dd($valida);
		foreach ($valida as $value) {
			//dd($value['users_id']);
			//Si el estado de la solicitud ya tiene contizaciones creadas o otro nivel de aprovación
			if ($value['state_id'] == 1) {
				//Condición para validar el id de la información que se va a editar
				//Si la persona no es la que ingreso la información no lo dejara editar
				if ($value['users_id'] == Auth::id()) {
					return view('request.edit')->with(compact('requests')); //Ver formulario de registro para editar la información
				}
			}
			return redirect('/home');
		}
	}

	public function update (Request $request, $id) {
		//dd($request->all());

		$messages = [
			'tipo_solicitud.required' => 'Debe seleccionar una opción',
			'viaticos.required' => 'Debe seleccionar una opción',
			'justificacion.required' => 'Debe seleccionar una opción',
			'tipo_viaje_1.required' => 'Debe seleccionar una opción',
			'origen_1.required' => 'Debe ingresar el origen',
			'destino_1.required' => 'Debe ingresar el destino',
			'start_1.required' => 'Debe selecionar la fecha',
			'start_1.after_or_equal' => 'La fecha debe ser superior a la actual',
			'hotel_1.required' => 'Debe selecionar una opción',
			'equipaje_1.required' => 'Debe selecionar una opción'
		];

		//Reglas de las validaciones
		$rules = [
			//'fecha' => 'required|after_or_equal:'.date('Y-m-d'),
			'tipo_solicitud' => 'required',
			'viaticos' => 'required',
			'justificacion' => 'required',
			'tipo_viaje_1' => 'required',
			'origen_1' => 'required',
			'destino_1' => 'required',
			'start_1' => 'required|after_or_equal:'.date('Y-m-d'),
			'hotel_1' => 'required',
			'equipaje_1' => 'required'
		];

		//Función para la validación del formulario, recibe 3 parametros
		$this->validate($request, $rules, $messages);

		$requests = Requests::find($id);

		$requests->tipo_solicitud = $request->input('tipo_solicitud');
		$requests->viaticos = $request->input('viaticos');
		$requests->justificacion = $request->input('justificacion');
		$requests->tipo_viaje_1 = $request->input('tipo_viaje_1');
		$requests->origen_1 = $request->input('origen_1');
		$requests->destino_1 = $request->input('destino_1');
		$requests->fecha_salida_1 = $request->input('start_1');
		$requests->fecha_retorno_1 = $request->input('end_1');
		$requests->dias_1 = $request->input('dias_1');
		$requests->hotel_1 = $request->input('hotel_1');
		$requests->equipaje_1 = $request->input('equipaje_1');
		$requests->tipo_viaje_2 = $request->input('tipo_viaje_2');
		$requests->origen_2 = $request->input('origen_2');
		$requests->destino_2 = $request->input('destino_2');
		$requests->fecha_salida_2 = $request->input('start_2');
		$requests->fecha_retorno_2 = $request->input('end_2');
		$requests->dias_2 = $request->input('dias_2');
		$requests->hotel_2 = $request->input('hotel_2');
		$requests->equipaje_2 = $request->input('equipaje_2');
		$requests->tipo_viaje_3 = $request->input('tipo_viaje_3');
		$requests->origen_3 = $request->input('origen_3');
		$requests->destino_3 = $request->input('destino_3');
		$requests->fecha_salida_3 = $request->input('start_3');
		$requests->fecha_retorno_3 = $request->input('end_3');
		$requests->dias_3 = $request->input('dias_3');
		$requests->hotel_3 = $request->input('hotel_3');
		$requests->equipaje_3 = $request->input('equipaje_3');
		$requests->observacion = $request->input('observacion');
		$requests->save(); //UPDATE

		return redirect('/request');
	}

	/*public function destroy ($id) {
		$product = Product::find($id);
		$product->delete(); //DELETE

		return back();
	}*/
}