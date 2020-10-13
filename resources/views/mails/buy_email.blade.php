<!DOCTYPE html>
<html>
<head>
	<title>Correo compra</title>
</head>
<body>
	@foreach ($msg as $valores)
		<p>Buen día, Finalización compra</p>
		<p>Se ha generado una compra para la solicitud de gasto de viaje # {{$valores->id_requests}}</p>
		<p>A continuación se detallan los datos de la compra generada</p>

		<table border="1" style="border-collapse: collapse; text-align: center;">
			<tr>
				<th colspan="6">Datos de contacto</th>
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
	@endforeach

	@foreach ($datos as $info)
		<table border="1" style="border-collapse: collapse; text-align: center;">
			<tr>
				<th colspan="3">Información de la compra</th>
			</tr>
			<tr>
				<td>Reserva vuelo</td>
				<td>Reserva hotel</td>
				<td>Archivo</td>
			</tr>
			<tr>
				<td>{{$info->reserva_vuelo}}</td>
				<td>{{$info->reserva_hotel}}</td>
				<td>
					<a href="http://localhost/laravel/viajes-app/public/img/compra/{{$info->img_compra}}"></a>Click aquí
				</td>
			</tr>
		</table>
	@endforeach
</body>
</html>