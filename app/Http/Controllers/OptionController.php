<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Requests;
use App\History;

class OptionController extends Controller
{
    public function estados () {

		$requests = Requests::select('requests.*', 'users.id AS id_user', 'users.name', 'users.last_name', 'states.nombre AS name_state')
								->join('users', 'requests.users_id', '=', 'users.id')
								->join('states', 'requests.state_id', '=', 'states.id')
								->where('requests.estado', '=', 1)
								->whereIn('requests.state_id', [2, 3])
								->get();

		return view('request.index')->with(compact('requests'));
	}

	public function pendientes () {

		$requests = Requests::select('requests.id AS id_requests', 'requests.*', 'users.id AS id_user', 'users.name', 'users.last_name', 'states.nombre AS name_state', 'quotations.id AS id_quotations', 'quotations.*')
								->join('users', 'requests.users_id', '=', 'users.id')
								->join('states', 'requests.state_id', '=', 'states.id')
								->join('quotations', 'requests.id', '=', 'quotations.requests_id')
								->where('requests.estado', '=', 1)
								->where('requests.state_id', '=', 4)
								->where('quotations.aprobacion', '=', 1)
								->get();

		return view('request.pendiente')->with(compact('requests'));
	}

	public function aprobado () {

		$requests = Requests::select('requests.id AS id_requests', 'requests.*', 'users.id AS id_user', 'users.name', 'users.last_name', 'states.nombre AS name_state', 'quotations.id AS id_quotations', 'quotations.*')
								->join('users', 'requests.users_id', '=', 'users.id')
								->join('states', 'requests.state_id', '=', 'states.id')
								->join('quotations', 'requests.id', '=', 'quotations.requests_id')
								->where('requests.estado', '=', 1)
								->where('requests.state_id', '=', 9)
								->where('quotations.aprobacion', '=', 1)
								->get();

		return view('request.aprobado')->with(compact('requests'));
	}
}
