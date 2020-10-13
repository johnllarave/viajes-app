<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailContabilidad;
use App\Mail\EmailBuy;
use App\Quotation;
use App\Requests;
use App\History;
use App\Buy;

class BuyController extends Controller
{
    public function index ($id) {
    	$buy = Buy::select('*')
    				->where('id_quotation', $id)
    				->where('estado', 1)
    				->get();

    	foreach ($buy as $valor) {
    		//if (Auth::user()->id != $valor['id_user']) {}
    		if ($valor['id_buy'] != '') {
    			$compra = 1;
    			return view('admin.buy.index')->with(compact('buy'))->with('id', $id)->with('compra', $compra);
    		} else {

    		}
    	}
    	//dd($buy);
    	$compra = 0;
    	return view('admin.buy.index')->with('buy', $buy)->with('id', $id)->with('compra', $compra);
    }

    public function store (Request $request, $id) {

		$buy = new Buy();

		$buy->medio = $request->input('medio');
		$buy->total_vuelo = $request->input('total_vuelo');
		$buy->total_hotel = $request->input('total_hotel');
		$buy->reserva_vuelo = $request->input('reserva_vuelo');
		$buy->reserva_hotel = $request->input('reserva_hotel');
		$buy->valor_viatico = $request->input('valor_viatico');
		$buy->id_user = Auth::id();
		$buy->id_quotation = $id;

		$file = $request->file('img_compra');
		// si el campo de la imagen viene vacia no entra a esta condición
		if ($file != '') {
			$path = public_path() . '/img/compra';
			$fileName = uniqid() . $file->getClientOriginalName();
			$moved = $file->move($path, $fileName);
			$buy->img_compra = $fileName;
		}

		$buy->save(); //INSERT

		/*$log_history = new History();

		$log_history->state_id = 8;
		$log_history->requests_id = $id_requests;
		$log_history->observacion = 'Solicitud cotizada';
		$log_history->save();*/

		return redirect('/estados/pendiente');
	}

	public function aprobar (Request $request, $id) {
		$requests = Requests::find($id);
		$requests->state_id = 9;
		$requests->save();

		$log_history = new History();
		$log_history->state_id = 9;
		$log_history->requests_id = $id;
		$log_history->observacion = 'Se aprueba la solicitud por gerente de compras';
		$log_history->save();

		return redirect('/estados/pendiente');
	}

	public function email (Request $request, $id) { //id de la cotización
		$buy = Buy::select('*')
    				->where('id_quotation', $id)
    				->where('estado', 1)
    				->get();

    	$query = Quotation::select('users.id AS id_user' , 'users.*', 'requests.id AS id_requests', 'requests.viaticos AS viatico', 'requests.created_at AS fecha_creacion', 'requests.*', 'quotations.id AS id_quotations', 'quotations.*')
					->join('requests', 'requests.id', '=', 'quotations.requests_id')
					->join('users', 'users.id', '=', 'requests.users_id')
					->where('quotations.id', '=', $id)
					->get();

		foreach ($query as $correo) {
			$email = $correo['email'];
			$id_requests = $correo['id_requests'];
		}

		foreach ($buy as $viatico) {
			$valor_viatico = $viatico['valor_viatico'];
		}

		if ($valor_viatico > 0) {
			//Mail::to('ivan.arjona@grupo-sm.com', 'caroina.soto@grupo-sm.com')->send(new EmailContabilidad($query, $buy));
			Mail::to('john.llarave@grupo-sm.com', 'john.llarave@grupo-sm.com')->send(new EmailContabilidad($query, $buy));
		}

		//dd($email);

		$requests = Requests::find($id_requests);
		$requests->state_id = 5;
		$requests->save();

		//Mail::to(''.$email.'')->send(new EmailBuy($buy));
		Mail::to('john.llarave@grupo-sm.com')->send(new EmailBuy($query, $buy));

		$log_history = new History();

		$log_history->state_id = 5;
		$log_history->requests_id = $id_requests;
		$log_history->observacion = 'Se finaliza la compra realizada';
		$log_history->save();

		return back();
	}
}
