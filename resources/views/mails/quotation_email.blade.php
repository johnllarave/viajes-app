<!DOCTYPE html>
<html>
<head>
	<title>Correo Cotización</title>
</head>
<style>
	#btn_aceptar {
		margin-top: -5px;
		background-color: #53BF52;
	    border-color: #ED1B2E;
	    color: #FFFFFF;
	    border-radius: 3px;
	    padding: 5px 10px;
	    font-size: 12px;
	    line-height: 1.5;
	}

	#btn_rechazar {
		margin-top: -5px;
		background-color: #ED1B2E;
	    border-color: #ED1B2E;
	    color: #FFFFFF;
	    border-radius: 3px;
	    padding: 5px 10px;
	    font-size: 12px;
	    line-height: 1.5;
	}

	#btn_cancelar {
		margin-top: -5px;
		background-color: #2E38B7;
	    border-color: #ED1B2E;
	    color: #FFFFFF;
	    border-radius: 3px;
	    padding: 5px 10px;
	    font-size: 12px;
	    line-height: 1.5;
	}
</style>
<body>
	@foreach ($msg as $valores)
		<p>Buen día, Correo para autorizar la cotización</p>
		<p>Se ha generado una cotización para el gasto de viaje solicitado # {{$valores->id_requests}}</p>
		<p>A continuación se detallan los datos de la solicitud la cual usted debera validar y confirmar esta cotización</p>

		<table border="1" style="border-collapse: collapse; text-align: center;">
			<tr>
				<th colspan="6">Datos del solicitante</th>
			</tr>
			<tr>
				<td>Nombre</td>
				<td>Documento</td>
				<td>Teléfono</td>
				<td>Código SAP</td>
				<td>Área</td>
				<td>Cargo</td>
			</tr>
			<tr>
				<td>{{$valores->name}} {{$valores->last_name}}</td>
				<td>{{$valores->documento}}</td>
				<td>{{$valores->telefono}}</td>
				<td>{{$valores->cod_sap}}</td>
				<td>{{$valores->area}}</td>
				<td>{{$valores->cargo}}</td>
			</tr>
		</table><br>

		<table border="1" style="border-collapse: collapse; text-align: center;">
			<tr>
				<th colspan="11">Detalle de la solicitud</th>
			</tr>
			<tr>
				<td>#</td>
				<td>Fecha Solicitud</td>
				<td>Tipo solicitud</td>
				<td>Requiere viaticos</td>
				<td>Origen</td>
				<td>Destino</td>
				<td>Retorno</td>
				<td>Fecha salida</td>
				<td>Hora salida</td>
				<td>Cantidad dias</td>
				<td>Requiere hotel</td>
			</tr>
			<tr>
				<td>{{$valores->id_requests}}</td>
				<td>{{$valores->fecha_creacion}}</td>
				<td>{{$valores->tipo_solicitud}}</td>
				<td>
					@if($valores->viatico == 1)
						Si
					@else
						No
					@endif
				</td>
				<td>{{$valores->origen_1}}</td>
				<td>{{$valores->destino_1}}</td>
				<td>{{$valores->retorno_1}}</td>
				<td>{{$valores->fecha_salida_1}}</td>
				<td>{{$valores->hora_salida_1}}</td>
				<td>{{$valores->dias_1}}</td>
				<td>
					@if($valores->hotel_1 == 1)
						Si
					@else
						No
					@endif
				</td>
			</tr>
		</table><br>

		<table border="1" style="border-collapse: collapse; text-align: center;">
			<tr>
				<th colspan="9">Detalle de la cotización</th>
			</tr>
			<tr>
				<td>Aerolínea</td>
				<td>Valor tiquete</td>
				<td>Iva vuelo</td>
				<td>Otros cargos</td>
				<td>Fecha</td>
				<td>Cabina</td>
				<td>Valor hotel</td>
				<td>Iva hotel</td>
				<td>Viaticos</td>
			</tr>
			<tr>
				<td>{{$valores->aerolinea}}</td>
				<td>{{number_format($valores->valor_tiquete)}}</td>
				<td>{{number_format($valores->iva_vuelo)}}</td>
				<td>{{number_format($valores->otros_cargos)}}</td>
				<td>{{$valores->fecha}} {{$valores->hora}}</td>
				<td>{{$valores->cabina}}</td>
				<td>{{number_format($valores->valor_noche)}}</td>
				<td>{{number_format($valores->iva_hotel)}}</td>
				<td>{{number_format($valores->viaticos)}}</td>
			</tr>
		</table><br>

		<table border="1" style="border-collapse: collapse; text-align: center;">
			<tr>
				<th colspan="4">Total de la cotización</th>
			</tr>
			<tr>
				<th>Total tiquete</th>
                <th>Total hotel</th>
                <th>Viaticos</th>
                <th>Total</th>
			</tr>
			<tr>
				<td>{{number_format($valores->valor_tiquete + $valores->iva_vuelo + $valores->otros_cargos)}}</td>
                <td>{{number_format($valores->valor_noche + $valores->iva_hotel)}}</td>
                <td>{{$valores->viaticos}}</td>
                <td>
                    {{number_format($valores->valor_tiquete + $valores->iva_vuelo + $valores->otros_cargos + $valores->valor_noche + $valores->iva_hotel + $valores->viaticos)}}
                </td>
			</tr>
		</table><br>

		<a href="http://localhost/laravel/viajes-app/public/mails/{{$valores->id_quotations}}/aceptar_email">
			<button id="btn_aceptar">Aceptar</button>
		</a>
		<a href="http://localhost/laravel/viajes-app/public/">
			<button id="btn_rechazar">Rechazar</button>
		</a>
		<a href="http://localhost/laravel/viajes-app/public/">
			<button id="btn_cancelar">Cancelar</button>
		</a>
	@endforeach
</body>
</html>