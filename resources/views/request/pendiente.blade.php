@extends('layouts.app')

@section('title', 'Solicitudes')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Listado de solicitudes</h5>
            </div>

            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha creación</th>
                                <th>Estado solicitud</th>
                                <th>Nombre</th>
                                <th>Tipo solicitud</th>
                                <th>Tipo de viaje</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Fecha salida</th>
                                <th>Dias</th>
                                <th>Detalle</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($requests as $solicitud)
                                <tr>
                                    <td>{{$solicitud->id_requests}}</td>
                                    <td>{{$solicitud->created_at}}</td>
                                    <td>{{$solicitud->name_state}}</td>
                                    <td>{{$solicitud->name .' '. $solicitud->last_name}}</td>
                                    <td>{{$solicitud->tipo_solicitud}}</td>
                                    <td>{{$solicitud->tipo_viaje_1}}</td>
                                    <td>{{$solicitud->origen_1}}</td>
                                    <td>{{$solicitud->destino_1}}</td>
                                    <td>{{$solicitud->fecha_salida_1}}</td>
                                    <td>{{$solicitud->dias_1}}</td>

                                    <td class="td-actions text-right text-center">
                                        @if($solicitud->state_id != 4)
                                            @if($solicitud->state_id == 1 && $solicitud->users_id == Auth::id() || $solicitud->state_id == 7)
                                                <a href="{{url('/request/'.$solicitud->id_requests.'/edit')}}" rel="tooltip" title="Editar" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @elseif($solicitud->state_id == 2 && $solicitud->users_id == Auth::id())
                                                <button class="btn btn-link btn-simple btn-xs" title="Editar"><i class="fa fa-ban"></i></button>
                                                <button type="button" class="btn btn-link btn-simple btn-xs" title="Rechazar" data-toggle="modal" data-target="#rechaza{{$solicitud->id}}">
                                                    <i class="fa fa-window-close-o"></i>
                                                </button>
                                                <button type="button" class="btn btn-link btn-simple btn-xs" title="Cancelar" data-toggle="modal" data-target="#cancela{{$solicitud->id}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-link btn-simple btn-xs" title="Editar"><i class="fa fa-ban"></i></button>
                                            @endif

                                            @if(auth()->user()->role_id == 1)
                                                <a href="{{url('/admin/quotation/'.$solicitud->id_requests.'/detail')}}" rel="tooltip" title="Ver detalle" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{url('/admin/quotation/'.$solicitud->id_requests.'/index')}}" rel="tooltip" title="Cotizaciones" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-suitcase"></i>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{url('/admin/quotation/'.$solicitud->id_requests.'/detail')}}" rel="tooltip" title="Ver detalle" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-user-circle-o"></i>
                                            </a>
                                            <a href="{{url('/admin/quotation/'.$solicitud->id_quotations.'/detailcotizacion')}}" rel="tooltip" title="Ver detalle cotización" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if ($solicitud->img != "")
                                                <a href="{{url('/contizaciones/vuelo/'.$solicitud->img)}}" target="_blank" rel="tooltip" title="Vuelo" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-fighter-jet"></i>
                                                </a>
                                            @else
                                                <a href="#" rel="tooltip" title="Vuelo" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-fighter-jet"></i>
                                                </a>
                                            @endif

                                            @if ($solicitud->img_hotel != "")
                                                <a href="{{url('/contizaciones/Hotel/'.$solicitud->img_hotel)}}" target="_blank" rel="tooltip" title="Hotel" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-building"></i>
                                                </a>
                                            @else
                                                <a href="#" rel="tooltip" title="Hotel" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-building"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/compra/'.$solicitud->id_quotations.'/index')}}" rel="tooltip" title="Generar compra" class="btn btn-link btn-simple btn-xs">
                                            <i class="fa fa-money"></i>
                                        </a>
                                        <a href="{{url('/contizaciones/Hotel/'.$solicitud->img_hotel)}}" rel="tooltip" title="Aprobar" class="btn btn-link btn-simple btn-xs">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                        <a href="{{url('/contizaciones/Hotel/'.$solicitud->img_hotel)}}" rel="tooltip" title="Enviar" class="btn btn-link btn-simple btn-xs">
                                            <i class="fa fa-paper-plane-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal" id="rechaza{{$solicitud->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="POST" action="{{url('/request/'.$solicitud->id_requests.'/rechaza')}}">
                                                    @csrf
                                                    <div class="form-group" style="text-align: center;">
                                                        <label>Explique el motivo por la cual desea rechazar esta solicitud</label>
                                                        <textarea name="observacion" rows="4" class="form-control"></textarea>
                                                    </div>
                                                    @error('observacion')
                                                        <span class="invalid-feedback" role="alert">
                                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-danger" name="btn_rechazo" value="Enviar">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">Cerrar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" id="cancela{{$solicitud->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="POST" action="{{url('/request/'.$solicitud->id_requests.'/cancela')}}">
                                                    @csrf
                                                    <div class="form-group" style="text-align: center;">
                                                        <label>Explique el motivo por la cual desea cancelar esta solicitud</label>
                                                        <textarea name="observacion" rows="4" class="form-control"></textarea>
                                                    </div>
                                                    @error('observacion')
                                                        <span class="invalid-feedback" role="alert">
                                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-danger" name="btn_cancela" value="Enviar">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">Cerrar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Fecha creación</th>
                                <th>Estado solicitud</th>
                                <th>Nombre</th>
                                <th>Tipo solicitud</th>
                                <th>Tipo de viaje</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Fecha salida</th>
                                <th>Dias</th>
                                <th>Detalle</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.config_table')

@endsection