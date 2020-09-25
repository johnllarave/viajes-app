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
                <h5>Lista de solicitudes</h5><!--leonardo.vargas@grupo-sm.com-->
                <a href="{{url('/request/create')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Crear Solicitud</strong></button>
                </a>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($requests as $solicitud)
                                <tr>
                                    <td>{{$solicitud->id}}</td>
                                    <td>{{$solicitud->created_at}}</td>
                                    @if($solicitud->state_id == 7)
                                        <td>
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#motivo{{$solicitud->id}}" style="font-size: 1em;">
                                                {{$solicitud->name_state}}
                                            </button>
                                        </td>
                                    @else
                                        <td>{{$solicitud->name_state}}</td>
                                    @endif
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
                                                <a href="{{url('/request/'.$solicitud->id.'/edit')}}" rel="tooltip" title="Editar" class="btn btn-link btn-simple btn-xs">
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
                                                <a href="{{url('/admin/quotation/'.$solicitud->id.'/detail')}}" rel="tooltip" title="Ver detalle" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{url('/admin/quotation/'.$solicitud->id.'/index')}}" rel="tooltip" title="Cotizaciones" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-suitcase"></i>
                                                </a>
                                            @endif
                                        @else
                                            
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal" id="rechaza{{$solicitud->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="POST" action="{{url('/request/'.$solicitud->id.'/rechaza')}}">
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
                                                <form method="POST" action="{{url('/request/'.$solicitud->id.'/cancela')}}">
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
                                <div class="modal" id="motivo{{$solicitud->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-group" style="text-align: center;">
                                                    <textarea name="observacion" rows="4" class="form-control" readonly>{{$solicitud->observacion_estado}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                </div>
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