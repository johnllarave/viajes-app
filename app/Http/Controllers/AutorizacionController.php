<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Quotation;
use App\Requests;
use App\Mail\EmailAceptar;
use App\Mail\EmailAutorizacion;
use App\History;
use App\User;

class AutorizacionController extends Controller
{
	//nivel de autorización para el viajero
	//debe enviar un correo al jefe directo para autorización
    public function acepta ($id) {
    	//dd($id);
		$query = Quotation::select('users.id AS id_user' , 'users.*', 'requests.id AS id_requests', 'requests.viaticos AS viatico', 'requests.created_at AS fecha_creacion', 'requests.*', 'quotations.id AS id_quotations', 'quotations.*')
								->join('requests', 'requests.id', '=', 'quotations.requests_id')
								->join('users', 'users.id', '=', 'requests.users_id')
								->where('quotations.id', '=', $id)
								->get();

		//Busca el id del Jefe para guardarlo en una variable
		foreach ($query as $datos) {
			$id_jefe = $datos['jefe'];
			$id_requests = $datos['id_requests'];
		}

		//Consulta para buscar el id del Jefe
		$query_id = User::select('*')
						->where('users.id', '=', $id_jefe)
						->get();

		//Guarda el id del jefe en una variable
		foreach ($query_id as $datos_id) {
			$email = $datos_id['email'];
		}

		//dd($email);
		//Actualización del estado de la solicitud
		$requests = Requests::find($id_requests);
		$requests->state_id = 3;
		$requests->save();

		//Mail::to(''.$email.'')->send(new EmailAceptar($query));
		Mail::to('john.llarave@grupo-sm.com')->send(new EmailAceptar($query));

		$log_history = new History();

		$log_history->state_id = 3;
		$log_history->requests_id = $id_requests;
		$log_history->observacion = 'Solicitud Autorizada viajero';
		$log_history->save();

		//return back();
		//return redirect('http://localhost/laravel/viajes-app/public/');
		return redirect('/');
	}

	//nivel de autorización para el viajero
	//debe enviar un correo al gerente de compras para que autorice la compra
	public function autoriza ($id) {

		$query = Quotation::select('users.id AS id_user' , 'users.*', 'requests.id AS id_requests', 'requests.viaticos AS viatico', 'requests.created_at AS fecha_creacion', 'requests.*', 'quotations.id AS id_quotations', 'quotations.*')
								->join('requests', 'requests.id', '=', 'quotations.requests_id')
								->join('users', 'users.id', '=', 'requests.users_id')
								->where('quotations.id', '=', $id)
								->get();

		//Busca el id del Jefe para guardarlo en una variable
		foreach ($query as $datos) {
			$id_requests = $datos['id_requests'];
		}

		$requests = Requests::find($id_requests);
		$requests->state_id = 4;
		$requests->save();

		//Mail::to('leonardo.vargas@grupo-sm.com')->send(new EmailAutorizacion($query));
		Mail::to('john.llarave@grupo-sm.com')->send(new EmailAutorizacion($query));

		$log_history = new History();

		$log_history->state_id = 4;
		$log_history->requests_id = $id_requests;
		$log_history->observacion = 'Solicitud Autorizada Jefe directo';
		$log_history->save();

		//return back();
		//return redirect('http://localhost/laravel/viajes-app/public/');
		return redirect('/');
	}

	/*public function aprueba ($id) {

		$query = Quotation::select('users.id AS id_user' , 'users.*', 'requests.id AS id_requests', 'requests.viaticos AS viatico', 'requests.created_at AS fecha_creacion', 'requests.*', 'quotations.id AS id_quotations', 'quotations.*')
								->join('requests', 'requests.id', '=', 'quotations.requests_id')
								->join('users', 'users.id', '=', 'requests.users_id')
								->where('quotations.id', '=', $id)
								->get();

		foreach ($query as $datos) {
			$id_requests = $datos['id_requests'];
		}

		//Actualización del estado de la solicitud
		$requests = Requests::find($id_requests);
		$requests->state_id = 8;
		$requests->save();

		$log_history = new History();

		$log_history->state_id = 8;
		$log_history->requests_id = $id_requests;
		$log_history->observacion = 'Solicitud Autorizada Por Gerente de Compras';
		$log_history->save();

		return redirect('/');
	}*/

	/*public function rechaza ($id) {

		$query = Quotation::select('users.id AS id_user' , 'users.*', 'requests.id AS id_requests', 'requests.viaticos AS viatico', 'requests.created_at AS fecha_creacion', 'requests.*', 'quotations.id AS id_quotations', 'quotations.*')
								->join('requests', 'requests.id', '=', 'quotations.requests_id')
								->join('users', 'users.id', '=', 'requests.users_id')
								->where('quotations.id', '=', $id)
								->get();

		foreach ($query as $datos) {
			$id_requests = $datos['id_requests'];
		}

		dd($id_requests);
		//Actualización del estado de la solicitud
		$requests = Requests::find($id_requests);
		$requests->state_id = 8;
		$requests->save();

		$log_history = new History();

		$log_history->state_id = 8;
		$log_history->requests_id = $id_requests;
		$log_history->observacion = 'Solicitud Autorizada Por Gerente de Compras';
		$log_history->save();

		return redirect('/');
	}*/
}
