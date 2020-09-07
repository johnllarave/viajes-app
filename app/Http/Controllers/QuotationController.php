<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Quotation;
use App\Requests;
use App\Mail\EmailQuotation;

class QuotationController extends Controller
{
    public function index ($id = false) {
		//$requests = Requests::find($id);
		$requests = Requests::select('requests.*', 'users.id AS id_user', 'users.name', 'users.last_name', 'states.nombre AS name_state')
									->join('users', 'requests.users_id', '=', 'users.id')
									->join('states', 'requests.state_id', '=', 'states.id')
									->where('requests.id', '=', $id)
									->get();

		$quotation = Quotation::select('quotations.id AS id_quotations', 'quotations.viaticos AS viatico', 'quotations.*', 'requests.*')
									->join('requests', 'requests.id', '=', 'quotations.requests_id')
									->where('quotations.requests_id', '=', $id)
									->get();

		$quotations = Quotation::select('quotations.id AS id_quotations', 'quotations.viaticos AS viatico', 'quotations.*', 'requests.*')
									->join('requests', 'requests.id', '=', 'quotations.requests_id')
									->get();

		//dd($quotation);
		if ($id == false) {
			return view('admin.quotation.quotations')->with(compact('quotations'))->with('id', $id);
		} else {
			return view('admin.quotation.index')->with(compact('requests', 'quotation'))->with('id', $id);
		}
	}

	public function detail ($id) {
		$requests = Requests::select('requests.*', 'users.id AS id_user', 'users.*')
									->join('users', 'requests.users_id', '=', 'users.id')
									->where('requests.id', '=', $id)
									->get();

		return view('admin.quotation.detail')->with(compact('requests'));
	}

	public function create ($id) {
		return view('admin.quotation.create')->with('id', $id);
	}

	public function store (Request $request, $id) {

		$quotation = new Quotation();

		$quotation->vuelo = $request->input('vuelo');
		$quotation->aerolinea = $request->input('aerolinea');
		$quotation->hotel = $request->input('hotel');
		$quotation->viaticos = $request->input('viaticos');
		$quotation->alimento = $request->input('alimento');
		$quotation->requests_id = $request->input('id');
		$quotation->save(); //INSERT

		return redirect('/admin/quotation/'.$id.'/index');
	}

	public function edit ($id) {
		$quotation = Quotation::find($id);
		return view('admin.quotation.edit')->with(compact('quotation'));
	}

	public function update (Request $request, $id) {
		//Registrar nuevo producto
		//dd($request->all());

		$quotation = Quotation::find($id);

		$quotation->vuelo = $request->input('vuelo');
		$quotation->aerolinea = $request->input('aerolinea');
		$quotation->hotel = $request->input('hotel');
		$quotation->viaticos = $request->input('viaticos');
		$quotation->alimento = $request->input('alimento');
		$quotation->save(); //UPDATE

		return redirect('/admin/quotation/'.$request->input('id').'/index');
	}

	public function email ($id) {

		$query = Quotation::select('users.id AS id_user' , 'users.*', 'requests.id AS id_requests', 'requests.viaticos AS viatico', 'requests.created_at AS fecha_creacion', 'requests.*', 'quotations.id AS id_quotations', 'quotations.*')
								->join('requests', 'requests.id', '=', 'quotations.requests_id')
								->join('users', 'users.id', '=', 'requests.users_id')
								->where('quotations.id', '=', $id)
								->get();

		$quotation = Quotation::find($id);
		$quotation->aprobacion = 1;
		$quotation->save();

		//return view('admin.quotation.index')->with(compact('requests', 'quotation'))->with('id', $id);
		//dd($query);
		//Mail::to('john.llarave@grupo-sm.com')->send(new EmailQuotation($parametros));
		foreach ($query as $correo) {
			$email = $correo['email'];
			$id_requests = $correo['id_requests'];
		}

		$requests = Requests::find($id_requests);
		$requests->state_id = 2;
		$requests->save();

		Mail::to(''.$email.'')->send(new EmailQuotation($query));

		return back();
	}
}