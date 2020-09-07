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
                                    <td>{{$solicitud->name_state}}</td>
                                    <td>{{$solicitud->name .' '. $solicitud->last_name}}</td>
                                    <td>{{$solicitud->tipo_solicitud}}</td>
                                    <td>{{$solicitud->tipo_viaje_1}}</td>
                                    <td>{{$solicitud->origen_1}}</td>
                                    <td>{{$solicitud->destino_1}}</td>
                                    <td>{{$solicitud->fecha_salida_1}}</td>
                                    <td>{{$solicitud->dias_1}}</td>

                                    <td class="td-actions text-right text-center">
                                        @if($solicitud->state_id == 1 && $solicitud->users_id == Auth::id())
                                            <a href="{{url('/request/'.$solicitud->id.'/edit')}}" rel="tooltip" title="Editar" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @else
                                            <button class="btn btn-link btn-simple btn-xs"><i class="fa fa-ban"></i></button>
                                        @endif

                                        @if(auth()->user()->role_id == 1)
                                            <a href="{{url('/admin/quotation/'.$solicitud->id.'/detail')}}" rel="tooltip" title="Ver detalle" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{url('/admin/quotation/'.$solicitud->id.'/index')}}" rel="tooltip" title="Cotizaciones" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-suitcase"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
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