@extends('layouts.app')

@section('title', 'Crear solicitudes')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Crear solicitud</h5>
                <a href="{{url('/request')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Cancelar</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="ibox float-e-margins">
                    <div class="row">
                        <form method="POST" action="{{url('/request')}}">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Tipo solicitud</label>
                                    <select name="tipo_solicitud" class="form-control">
                                        <option></option>
                                        <option value="Terrestre">Terrestre</option>
                                        <option value="Aéreo nacional">Aéreo nacional</option>
                                        <option value="Aéreo internacional">Aéreo internacional</option>
                                    </select>
                                    @error('tipo_solicitud')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Viáticos</label>
                                    <select name="viaticos" id="viaticos" class="form-control">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('viaticos')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Justificación</label>
                                    <select name="justificacion" class="form-control">
                                        <option></option>
                                        <option value="Visita a clientes">Visita a clientes</option>
                                        <option value="Evento, Lanzamiento, Jornada">Evento, Lanzamiento, Jornada</option>
                                        <option value="Capacitación Docentes">Capacitación Docentes</option>
                                        <option value="Capacitación Interna - Colaboradores">Capacitación Interna - Colaboradores</option>
                                        <option value="Reunión con Delegaciones">Reunión con Delegaciones</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    @error('justificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="valores" style="display: none;">
                                <div class="col-md-12">
                                    <div class="form-group col-md-3">
                                        <label>Alimentación</label>
                                        <input type="text" name="alimentacion" class="form-control suma" value="{{old('alimentacion')}}" onkeyup="sumar();">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Kilometraje</label>
                                        <input type="text" name="kilometros" class="form-control suma" value="{{old('kilometros')}}" onkeyup="sumar();">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Otros</label>
                                        <input type="text" name="otro" class="form-control suma" value="{{old('otro')}}" onkeyup="sumar();">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Total</label>
                                        <input type="text" name="total" id="total" class="form-control" value="{{old('total')}}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <br><h3 style="text-align: center;"><b>Trayecto 1</b></h3>
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <select name="tipo_viaje_1" id="tipo_viaje_1" class="form-control">
                                        <option></option>
                                        <option value="Ida y vuelta">Ida y vuelta</option>
                                        <option value="Solo ida">Solo ida</option>
                                    </select>
                                    @error('tipo_viaje_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input type="text" name="origen_1" class="form-control" value="{{old('origen_1')}}">
                                    @error('origen_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input type="text" name="destino_1" class="form-control" value="{{old('destino_1')}}">
                                    @error('destino_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <div id="data_5">
                                    <div class="input-daterange" id="datepicker">
                                        <div class="form-group col-md-3">
                                            <label>Fecha salida</label>
                                            <input type="text" name="start_1" id="start_1" class="form-control" value="{{old('start_1')}}">
                                            @error('start_1')
                                                <span class="invalid-feedback" role="alert">
                                                    <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Fecha retorno <span id="dias_viaje_1"></span></label>
                                            <input type="text" name="end_1" id="end_1" class="form-control" value="{{old('end_1')}}">
                                            <input type="hidden" name="dias_1" id="dias_1" value="{{old('dias_1')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Jornada</label>
                                    <select name="jornada_1" class="form-control">
                                        <option></option>
                                        <option value="Mañana">Mañana</option>
                                        <option value="Tarde">Tarde</option>
                                        <option value="Noche">Noche</option>
                                    </select>
                                    @error('jornada_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Hotel</label>
                                    <select name="hotel_1" class="form-control">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('hotel_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Equipaje de bodega</label>
                                    <select name="equipaje_1" class="form-control">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('equipaje_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <br><h3 style="text-align: center;"><b>Trayecto 2</b></h3>
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <select name="tipo_viaje_2" id="tipo_viaje_2" class="form-control">
                                        <option></option>
                                        <option value="Ida y vuelta">Ida y vuelta</option>
                                        <option value="Solo ida">Solo ida</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input type="text" name="origen_2" class="form-control" value="{{old('origen_2')}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input type="text" name="destino_2" class="form-control" value="{{old('destino_2')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="data_5">
                                    <div class="input-daterange" id="datepicker">
                                        <div class="form-group col-md-3">
                                            <label>Fecha salida</label>
                                            <input type="text" name="start_2" id="start_2" class="form-control" value="{{old('start_2')}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Fecha retorno <span id="dias_viaje_2"></span></label>
                                            <input type="text" name="end_2" id="end_2" class="form-control" value="{{old('end_2')}}">
                                            <input type="hidden" name="dias_2" id="dias_2" value="{{old('dias_2')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Jornada</label>
                                    <select name="jornada_2" class="form-control">
                                        <option></option>
                                        <option value="Mañana">Mañana</option>
                                        <option value="Tarde">Tarde</option>
                                        <option value="Noche">Noche</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Hotel</label>
                                    <select name="hotel_2" class="form-control">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Equipaje de bodega</label>
                                    <select name="equipaje_2" class="form-control">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <br><h3 style="text-align: center;"><b>Trayecto 3</b></h3>
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <select name="tipo_viaje_3" id="tipo_viaje_3" class="form-control">
                                        <option></option>
                                        <option value="Ida y vuelta">Ida y vuelta</option>
                                        <option value="Solo ida">Solo ida</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input type="text" name="origen_3" class="form-control" value="{{old('origen_3')}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input type="text" name="destino_3" class="form-control" value="{{old('destino_3')}}">
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <div id="data_5">
                                    <div class="input-daterange" id="datepicker">
                                        <div class="form-group col-md-3">
                                            <label>Fecha salida</label>
                                            <input type="text" name="start_3" id="start_3" class="form-control" value="{{old('start_3')}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Fecha retorno <span id="dias_viaje_3"></span></label>
                                            <input type="text" name="end_3" id="end_3" class="form-control" value="{{old('end_3')}}">
                                            <input type="hidden" name="dias_3" id="dias_3" value="{{old('dias_3')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Jornada</label>
                                    <select name="jornada_3" class="form-control">
                                        <option></option>
                                        <option value="Mañana">Mañana</option>
                                        <option value="Tarde">Tarde</option>
                                        <option value="Noche">Noche</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Hotel</label>
                                    <select name="hotel_3" class="form-control">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Equipaje de bodega</label>
                                    <select name="equipaje_3" class="form-control">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12"><br>
                                <div class="form-group col-md-12">
                                    <label>Observación</label>
                                    <textarea class="form-control" name="observacion" rows="4">{{old('observacion')}}</textarea>
                                </div>
                                @error('observacion')
                                    <span class="invalid-feedback" role="alert">
                                        <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                    </span>
                                @enderror

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary pull-right m-t-n-xs">
                                        <strong>Guardar</strong>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.config_form')

@endsection