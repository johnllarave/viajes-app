@extends('layouts.app')

@section('title', 'Detalle solicitudes')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                @foreach ($requests as $detalle)
                    <h5>Detalle de la solicitud <b>#{{$detalle->id}}</b></h5>
                @endforeach
                <a href="{{url('/request')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Regresar</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="ibox float-e-margins">
                    <div class="row">
                        @foreach ($requests as $detalle)
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label>Nombres y apellidos</label>
                                    <input class="form-control" value="{{$detalle->name}} {{$detalle->last_name}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Documento</label>
                                    <input class="form-control" value="{{$detalle->documento}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Teléfono</label>
                                    <input class="form-control" value="{{$detalle->telefono}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-2">
                                    <label>Codígo SAP</label>
                                    <input class="form-control" value="{{$detalle->cod_sap}}" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Ceco</label>
                                    <input class="form-control" value="{{$detalle->ceco}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Área</label>
                                    <input class="form-control" value="{{$detalle->area}}" readonly>
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Cargo</label>
                                    <input class="form-control" value="{{$detalle->cargo}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Empresa</label>
                                    <input class="form-control" value="{{$detalle->empresa}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Tipo solicitud</label>
                                    <input class="form-control" value="{{$detalle->tipo_solicitud}}" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Viáticos</label>
                                    @if ($detalle->viaticos == 1)
                                        <input class="form-control" value="Si" readonly>
                                    @else
                                        <input class="form-control" value="No" readonly>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Justificación</label>
                                    <input class="form-control" value="{{$detalle->justificacion}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <br><h3 style="text-align: center;"><b>Trayecto 1</b></h3>
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <input class="form-control" value="{{$detalle->tipo_viaje_1}}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input class="form-control" value="{{$detalle->origen_1}}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input class="form-control" value="{{$detalle->destino_1}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <div class="form-group col-md-3">
                                    <label>Fecha salida</label>
                                    <input class="form-control" value="{{$detalle->fecha_salida_1}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Fecha retorno 
                                        <span id="dias_viaje_1">(Cantidad de días: {{$detalle->dias_1}})</span>
                                    </label>
                                    <input class="form-control" value="{{$detalle->fecha_retorno_1}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Hotel</label>
                                    @if ($detalle->hotel_1 == 1)
                                        <input class="form-control" value="Si" readonly>
                                    @else
                                        <input class="form-control" value="No" readonly>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Equipaje de bodega</label>
                                    @if ($detalle->equipaje_1 == 1)
                                        <input class="form-control" value="Si" readonly>
                                    @else
                                        <input class="form-control" value="No" readonly>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <br><h3 style="text-align: center;"><b>Trayecto 2</b></h3>
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <input class="form-control" value="{{$detalle->tipo_viaje_2}}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input class="form-control" value="{{$detalle->origen_2}}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input class="form-control" value="{{$detalle->destino_2}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Fecha salida</label>
                                    <input class="form-control" value="{{$detalle->fecha_salida_2}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Fecha retorno 
                                        <span id="dias_viaje_2">(Cantidad de días: {{$detalle->dias_2}})</span>
                                    </label>
                                    <input class="form-control" value="{{$detalle->fecha_retorno_2}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Hotel</label>
                                    @if ($detalle->hotel_2 == 1)
                                        <input class="form-control" value="Si" readonly>
                                    @else
                                        <input class="form-control" value="No" readonly>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Equipaje de bodega</label>
                                    @if ($detalle->equipaje_2 == 1)
                                        <input class="form-control" value="Si" readonly>
                                    @else
                                        <input class="form-control" value="No" readonly>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <br><h3 style="text-align: center;"><b>Trayecto 3</b></h3>
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <input class="form-control" value="{{$detalle->tipo_viaje_3}}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input class="form-control" value="{{$detalle->origen_3}}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input class="form-control" value="{{$detalle->destino_3}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <div class="form-group col-md-3">
                                    <label>Fecha salida</label>
                                    <input class="form-control" value="{{$detalle->fecha_salida_3}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Fecha retorno 
                                        <span id="dias_viaje_3">(Cantidad de días: {{$detalle->dias_3}})</span>
                                    </label>
                                    <input class="form-control" value="{{$detalle->fecha_retorno_3}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Hotel</label>
                                    @if ($detalle->hotel_3 == 1)
                                        <input class="form-control" value="Si" readonly>
                                    @else
                                        <input class="form-control" value="No" readonly>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Equipaje de bodega</label>
                                    @if ($detalle->equipaje_3 == 1)
                                        <input class="form-control" value="Si" readonly>
                                    @else
                                        <input class="form-control" value="No" readonly>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12"><br>
                                <div class="form-group col-md-12">
                                    <label>Observación</label>
                                    <textarea class="form-control" readonly>{{$detalle->observacion}}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection