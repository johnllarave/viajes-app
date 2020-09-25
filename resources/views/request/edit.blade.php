@extends('layouts.app')

@section('title', 'Editar solicitudes')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Editar solicitud</h5>
                <a href="{{url('/request')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Cancelar</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="ibox float-e-margins">
                    <div class="row">
                        <form method="POST" action="{{url('/request/'.$requests->id.'/edit')}}">
                            @csrf
                            <div class="col-md-12">
                                @php
                                    $array_tipo = array('Terrestre' => 'Terrestre',
                                                        'Aéreo nacional' => 'Aéreo nacional',
                                                        'Aéreo internacional' => 'Aéreo internacional');
                                @endphp
                                <div class="form-group col-md-3">
                                    <label>Tipo solicitud</label>
                                    <select name="tipo_solicitud" class="form-control">
                                        @foreach ($array_tipo as $value => $name)
                                            @if ($requests->tipo_solicitud == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('tipo_solicitud')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                @php
                                    $array_viatico = array('1' => 'Si',
                                                           '0' => 'No');
                                @endphp
                                <div class="form-group col-md-3">
                                    <label>Viáticos</label>
                                    <select name="viaticos" class="form-control">
                                        @foreach ($array_viatico as $value => $name)
                                            @if ($requests->viaticos == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('viaticos')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                @php
                                    $array_justificacion = array('Visita a clientes' => 'Visita a clientes',
                                                                 'Evento, Lanzamiento, Jornada' => 'Evento, Lanzamiento, Jornada',
                                                                 'Capacitación Docentes' => 'Capacitación Docentes',
                                                                 'Capacitación Interna - Colaboradores' => 'Capacitación Interna - Colaboradores',
                                                                 'Reunión con Delegaciones' => 'Reunión con Delegaciones',
                                                                 'Otro' => 'Otro');
                                @endphp
                                <div class="form-group col-md-6">
                                    <label>Justificación</label>
                                    <select name="justificacion" class="form-control">
                                        @foreach ($array_justificacion as $value => $name)
                                            @if ($requests->justificacion == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                        @error('justificacion')
                                            <span class="invalid-feedback" role="alert">
                                                <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <br><h3 style="text-align: center;"><b>Trayecto 1</b></h3>
                                @php
                                    $array_tipo_viaje_1 = array('Ida y vuelta' => 'Ida y vuelta',
                                                                'Solo ida' => 'Solo ida');
                                @endphp
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <select name="tipo_viaje_1" id="tipo_viaje_1" class="form-control">
                                        @foreach ($array_tipo_viaje_1 as $value => $name)
                                            @if ($requests->tipo_viaje_1 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('tipo_viaje_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input type="text" name="origen_1" class="form-control" value="{{$requests->origen_1}}">
                                    @error('origen_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input type="text" name="destino_1" class="form-control" value="{{$requests->destino_1}}">
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
                                            <input type="text" name="start_1" id="start_1" class="form-control" value="{{$requests->fecha_salida_1}}">
                                            @error('start_1')
                                                <span class="invalid-feedback" role="alert">
                                                    <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Fecha retorno 
                                                <span id="dias_viaje_1">(Cantidad de días: {{$requests->dias_1}})</span>
                                            </label>
                                            <input type="text" name="end_1" id="end_1" class="form-control" value="{{$requests->fecha_retorno_1}}">
                                            <input type="hidden" name="dias_1" id="dias_1" value="{{$requests->dias_1}}">
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $array_jornada_1 = array('Mañana' => 'Mañana',
                                                             'Tarde' => 'Tarde',
                                                             'Noche' => 'Noche');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Jornada</label>
                                    <select name="jornada_1" class="form-control">
                                        @foreach ($array_jornada_1 as $value => $name)
                                            @if ($requests->jornada_1 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('jornada_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                @php
                                    $array_hotel_1 = array('1' => 'Si',
                                                           '0' => 'No');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Hotel</label>
                                    <select name="hotel_1" class="form-control">
                                        @foreach ($array_hotel_1 as $value => $name)
                                            @if ($requests->hotel_1 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('hotel_1')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                @php
                                    $array_equipaje_1 = array('1' => 'Si',
                                                              '0' => 'No');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Equipaje de bodega</label>
                                    <select name="equipaje_1" class="form-control">
                                        @foreach ($array_equipaje_1 as $value => $name)
                                            @if ($requests->equipaje_1 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
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
                                @php
                                    $array_tipo_viaje_2 = array('' => '',
                                                                'Ida y vuelta' => 'Ida y vuelta',
                                                                'Solo ida' => 'Solo ida');
                                @endphp
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <select name="tipo_viaje_2" id="tipo_viaje_2" class="form-control">
                                        @foreach ($array_tipo_viaje_2 as $value => $name)
                                            @if ($requests->tipo_viaje_2 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input type="text" name="origen_2" class="form-control" value="{{$requests->origen_2}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input type="text" name="destino_2" class="form-control" value="{{$requests->destino_2}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="data_5">
                                    <div class="input-daterange" id="datepicker">
                                        <div class="form-group col-md-3">
                                            <label>Fecha salida</label>
                                            <input type="text" name="start_2" id="start_2" class="form-control" value="{{$requests->fecha_salida_2}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Fecha retorno 
                                                <span id="dias_viaje_2">(Cantidad de días: {{$requests->dias_2}})</span>
                                            </label>
                                            <input type="text" name="end_2" id="end_2" class="form-control" value="{{$requests->fecha_retorno_2}}">
                                            <input type="hidden" name="dias_2" id="dias_2" value="{{$requests->dias_2}}">
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $array_jornada_2 = array('' => '',
                                                             'Mañana' => 'Mañana',
                                                             'Tarde' => 'Tarde',
                                                             'Noche' => 'Noche');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Jornada</label>
                                    <select name="jornada_2" class="form-control">
                                        @foreach ($array_jornada_2 as $value => $name)
                                            @if ($requests->jornada_2 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @php
                                    $array_hotel_2 = array('' => '',
                                                           '1' => 'Si',
                                                           '0' => 'No');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Hotel</label>
                                    <select name="hotel_2" class="form-control">
                                        @foreach ($array_hotel_2 as $value => $name)
                                            @if ($requests->hotel_2 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @php
                                    $array_equipaje_2 = array('' => '',
                                                              '1' => 'Si',
                                                              '0' => 'No');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Equipaje de bodega</label>
                                    <select name="equipaje_2" class="form-control">
                                        @foreach ($array_equipaje_2 as $value => $name)
                                            @if ($requests->equipaje_2 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <br><h3 style="text-align: center;"><b>Trayecto 3</b></h3>
                                @php
                                    $array_tipo_viaje_3 = array('' => '',
                                                                'Ida y vuelta' => 'Ida y vuelta',
                                                                'Solo ida' => 'Solo ida');
                                @endphp
                                <div class="form-group col-md-4">
                                    <label>Tipo de viaje</label>
                                    <select name="tipo_viaje_3" id="tipo_viaje_3" class="form-control">
                                        @foreach ($array_tipo_viaje_3 as $value => $name)
                                            @if ($requests->tipo_viaje_3 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Origen</label>
                                    <input type="text" name="origen_3" class="form-control" value="{{$requests->origen_3}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Destino</label>
                                    <input type="text" name="destino_3" class="form-control" value="{{$requests->destino_3}}">
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color: #F8F8F8;">
                                <div id="data_5">
                                    <div class="input-daterange" id="datepicker">
                                        <div class="form-group col-md-3">
                                            <label>Fecha salida</label>
                                            <input type="text" name="start_3" id="start_3" class="form-control" value="{{$requests->fecha_salida_3}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Fecha retorno 
                                                <span id="dias_viaje_3">(Cantidad de días: {{$requests->dias_3}})</span>
                                            </label>
                                            <input type="text" name="end_3" id="end_3" class="form-control" value="{{$requests->fecha_retorno_3}}">
                                            <input type="hidden" name="dias_3" id="dias_3" value="{{$requests->dias_3}}">
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $array_jornada_3 = array('' => '',
                                                             'Mañana' => 'Mañana',
                                                             'Tarde' => 'Tarde',
                                                             'Noche' => 'Noche');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Jornada</label>
                                    <select name="jornada_3" class="form-control">
                                        @foreach ($array_jornada_3 as $value => $name)
                                            @if ($requests->jornada_3 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @php
                                    $array_hotel_3 = array('' => '',
                                                           '1' => 'Si',
                                                           '0' => 'No');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Hotel</label>
                                    <select name="hotel_3" class="form-control">
                                        @foreach ($array_hotel_3 as $value => $name)
                                            @if ($requests->hotel_3 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @php
                                    $array_equipaje_3 = array('' => '',
                                                              '1' => 'Si',
                                                              '0' => 'No');
                                @endphp
                                <div class="form-group col-md-2">
                                    <label>Equipaje de bodega</label>
                                    <select name="equipaje_3" class="form-control">
                                        @foreach ($array_equipaje_3 as $value => $name)
                                            @if ($requests->equipaje_3 == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12"><br>
                                <div class="form-group col-md-12">
                                    <label>Observación</label>
                                    <textarea class="form-control" name="observacion" rows="4">{{$requests->observacion}}</textarea>
                                </div>
                                @error('observacion')
                                    <span class="invalid-feedback" role="alert">
                                        <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                    </span>
                                @enderror

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary pull-right m-t-n-xs">
                                        <strong>Actualizar</strong>
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