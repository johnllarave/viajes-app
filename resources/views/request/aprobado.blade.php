@extends('layouts.app')

@section('title', 'Aprobado')

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
                                            <a href="#" rel="tooltip" title="No hay imagen" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-times-rectangle-o"></i>
                                            </a>
                                        @endif

                                        @if ($solicitud->img_hotel != "")
                                            <a href="{{url('/contizaciones/Hotel/'.$solicitud->img_hotel)}}" target="_blank" rel="tooltip" title="Hotel" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-building"></i>
                                            </a>
                                        @else
                                            <a href="#" rel="tooltip" title="No hay imagen" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-times-rectangle-o"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="GET" action="{{url('/compra/'.$solicitud->id_quotations.'/mails')}}">
                                            <a href="{{url('/compra/'.$solicitud->id_quotations.'/index')}}" rel="tooltip" title="Generar compra" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-money"></i>
                                            </a>
                                            <button type="submit" class="btn btn-link btn-simple btn-xs" title="Enviar compra">
                                                <i class="fa fa-paper-plane-o"></i>
                                            </button>
                                        </form>
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