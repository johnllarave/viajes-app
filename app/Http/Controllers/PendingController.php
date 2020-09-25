<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Quotation;
use App\Requests;
use App\Mail\EmailQuotation;
use App\History;

class PendingController extends Controller
{
    public function index () {

		$requests = Requests::select('requests.*', 'users.id AS id_user', 'users.name', 'users.last_name', 'states.nombre AS name_state')
									->join('users', 'requests.users_id', '=', 'users.id')
									->join('states', 'requests.state_id', '=', 'states.id')
									//->where('requests.id', '=', $id)
									->get();

		$quotation = Quotation::select('quotations.id AS id_quotations', 'quotations.viaticos AS viatico', 'quotations.*', 'requests.*')
									->join('requests', 'requests.id', '=', 'quotations.requests_id')
									//->where('quotations.requests_id', '=', $id)
									->get();

		return view('admin.pending.index')->with(compact('requests', 'quotation'));
	}
}
