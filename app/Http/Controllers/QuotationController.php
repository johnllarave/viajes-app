<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Quotation;
use App\Requests;
use App\Mail\EmailQuotation;
use App\History;

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
									//->where('quotations.aprobacion', '=', 1)
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

		$quotation->aerolinea = $request->input('aerolinea');
		$quotation->valor_tiquete = $request->input('valor_tiquete');
		$quotation->iva_vuelo = $request->input('iva_vuelo');
		$quotation->otros_cargos = $request->input('otros_cargos');
		$quotation->fecha = $request->input('fecha');
		$quotation->hora = $request->input('hora');
		$quotation->cabina = $request->input('cabina');
		$quotation->valor_noche = $request->input('valor_noche');
		$quotation->iva_hotel = $request->input('iva_hotel');
		$quotation->viaticos = $request->input('viaticos');
		$quotation->requests_id = $request->input('id');

		$file_1 = $request->file('img');
		if ($file_1 != "") {
			$path_1 = public_path() . '/contizaciones/vuelo';
			$fileName_1 = uniqid() . $file_1->getClientOriginalName();
			$moved_1 = $file_1->move($path_1, $fileName_1);
			$quotation->img = $fileName_1;
		}

		$file_2 = $request->file('img_hotel');
		if ($file_2 != "") {
			$path_2 = public_path() . '/contizaciones/hotel';
			$fileName_2 = uniqid() . $file_2->getClientOriginalName();
			$moved_2 = $file_2->move($path_2, $fileName_2);
			$quotation->img_hotel = $fileName_2;
		}

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

		$quotation->aerolinea = $request->input('aerolinea');
		$quotation->valor_tiquete = $request->input('valor_tiquete');
		$quotation->iva_vuelo = $request->input('iva_vuelo');
		$quotation->otros_cargos = $request->input('otros_cargos');
		$quotation->fecha = $request->input('fecha');
		$quotation->hora = $request->input('hora');
		$quotation->cabina = $request->input('cabina');
		$quotation->valor_noche = $request->input('valor_noche');
		$quotation->iva_hotel = $request->input('iva_hotel');
		$quotation->viaticos = $request->input('viaticos');

		$file_1 = $request->file('img');
		// si el campo de la imagen viene vacia no entra a esta condición
		if ($file_1 != '') {
			$path_1 = public_path() . '/contizaciones/vuelo';
			$fileName_1 = uniqid() . $file_1->getClientOriginalName();
			$moved_1 = $file_1->move($path_1, $fileName_1);
			$quotation->img = $fileName_1;
		}

		$file_2 = $request->file('img_hotel');
		// si el campo de la imagen del hotel viene vacia no entra a esta condición
		if ($file_2 != '') {
			$path_2 = public_path() . '/contizaciones/hotel';
			$fileName_2 = uniqid() . $file_2->getClientOriginalName();
			$moved_2 = $file_2->move($path_2, $fileName_2);
			$quotation->img_hotel = $fileName_2;
		}

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

		//Mail::to(''.$email.'')->send(new EmailQuotation($query));
		Mail::to('john.llarave@grupo-sm.com')->send(new EmailQuotation($query));

		$log_history = new History();

		$log_history->state_id = 2;
		$log_history->requests_id = $id_requests;
		$log_history->observacion = 'Solicitud cotizada';
		$log_history->save();

		return back();
	}

	public function detailcotizacion ($id) {

		$quotation = Quotation::find($id);

		return view('admin.quotation.detailcotizacion')->with(compact('quotation'));
	}
}