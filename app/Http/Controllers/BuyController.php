<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Mail\EmailQuotation;
use App\History;
use App\Buy;

class BuyController extends Controller
{
    public function index ($id) {
    	return view('admin.buy.index')->with('id', $id);
    }

    public function store (Request $request, $id) {

		$buy = new Buy();

		$buy->medio = $request->input('medio');
		$buy->total_vuelo = $request->input('total_vuelo');
		$buy->total_hotel = $request->input('total_hotel');
		$buy->reserva_vuelo = $request->input('reserva_vuelo');
		$buy->reserva_hotel = $request->input('reserva_hotel');
		$buy->id_quotation = $id;

		$file = $request->file('img_compra');
		$path = public_path() . '/img/compra';
		$fileName = uniqid() . $file->getClientOriginalName();
		$moved = $file->move($path, $fileName);

		$buy->img_compra = $fileName;
		$buy->save(); //INSERT

		/*$log_history = new History();

		$log_history->state_id = 8;
		$log_history->requests_id = $id_requests;
		$log_history->observacion = 'Solicitud cotizada';
		$log_history->save();*/

		return redirect('/estados/pendiente');
	}
}
