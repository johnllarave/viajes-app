@extends('layouts.app')

@section('title', 'Cotizaciones')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Lista de cotizaciones</h5>
                @foreach ($requests as $solicitud)
                    @if($solicitud->state_id == 1)
                        <a href="{{url('/admin/quotation/'.$id.'/create')}}">
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button">
                                <strong>Crear Cotización</strong>
                            </button>
                        </a>
                    @endif
                @endforeach
            </div>
            <!--<div class="ibox-title">
                <h5>Detalle de la solicitud</h5><br><br>
                @foreach ($requests as $solicitud)
                    <b>ID: </b>{{$solicitud->id}}<br>
                    <b>Estado solicitud: </b>{{$solicitud->name_state}}<br>
                    <b>Fecha: </b>{{$solicitud->fecha}}<br>
                    <b>Nombre: </b>{{$solicitud->name .' '. $solicitud->last_name}}<br>
                    <b>Tipo solicitud: </b>{{$solicitud->tipo_solicitud}}<br>
                    <b>Destino 1: </b>{{$solicitud->destino_1}}<br>
                    <b>Destino 2: </b>{{$solicitud->destino_2}}<br>
                    <b>Destino 3: </b>{{$solicitud->destino_3}}<br>
                    <b>Viaticos: </b>
                    @if($solicitud->viaticos == 1)
                        Si
                    @else
                        No
                    @endif<br>
                    <b>Justificación: </b>{{$solicitud->justificacion}}<br>
                    <b>Observación: </b>{{$solicitud->observacion}}<br>
                    <b>Fecha creeación: </b>{{$solicitud->created_at}}<br>
                @endforeach
            </div>-->
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Vuelo</th>
                                <th>Aerolínea</th>
                                <th>Hotel</th>
                                <th>Viaticos</th>
                                <th>Alimento</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($quotation as $cotizacion)
                                <tr>
                                    <td>{{$cotizacion->vuelo}}</td>
                                    <td>{{$cotizacion->aerolinea}}</td>
                                    <td>{{$cotizacion->hotel}}</td>
                                    <td>{{$cotizacion->viatico}}</td>
                                    <td>{{$cotizacion->alimento}}</td>
                                    @if($cotizacion->aprobacion == 1)
                                        <td>Selecionada</td>
                                    @else
                                        <td>Sin seleccionar</td>
                                    @endif

                                    <td class="td-actions text-right text-center">
                                        @foreach ($requests as $solicitud)
                                            @if($solicitud->state_id == 1)
                                                <form method="GET" action="{{url('/mails/'.$cotizacion->id_quotations.'/quotation_email')}}">
                                                    <a href="{{url('/admin/quotation/'.$cotizacion->id_quotations.'/edit')}}" rel="tooltip" title="Editar" class="btn btn-link btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-link btn-simple btn-xs" title="Enviar cotización">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endforeach
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Vuelo</th>
                                <th>Aerolínea</th>
                                <th>Hotel</th>
                                <th>Viaticos</th>
                                <th>Alimento</th>
                                <th>Estado</th>
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