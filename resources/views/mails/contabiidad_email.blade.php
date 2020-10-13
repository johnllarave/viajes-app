<!DOCTYPE html>
<html>
<head>
	<title>Correo Notificación</title>
</head>
<body>
	@foreach ($msg as $valores)
		<p>Buen día, Correo para las personas de contabilidad</p>
		<p>Se ha generado solicitud de gasto de viaje la cual se detalla a continuación los viaticos requeridos # {{$valores->id_requests}}</p>

		<table border="1" style="border-collapse: collapse; text-align: center;">
			<tr>
				<th colspan="6">Datos del contacto</th>
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
	@endforeach

	@foreach ($datos as $info)
		<p>Valor de viatico: {{$info->valor_viatico}}</p>
	@endforeach
</body>
</html>