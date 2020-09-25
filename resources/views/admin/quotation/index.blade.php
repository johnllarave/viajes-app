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
                    @if($solicitud->state_id == 1 || $solicitud->state_id == 7)
                        <a href="{{url('/admin/quotation/'.$id.'/create')}}">
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button">
                                <strong>Crear Cotización</strong>
                            </button>
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Aerolinea</th>
                                <th>Fecha</th>
                                <th>Total tiquete</th>
                                <th>Total hotel</th>
                                <th>Viaticos</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                                <th>Enviar</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($quotation as $cotizacion)
                                <tr>
                                    <td>{{$cotizacion->aerolinea}}</td>
                                    <td>{{$cotizacion->fecha}} {{$cotizacion->hora}}</td>
                                    <td>{{number_format($cotizacion->valor_tiquete + $cotizacion->iva_vuelo + $cotizacion->otros_cargos)}}</td>
                                    <td>{{number_format($cotizacion->valor_noche + $cotizacion->iva_hotel)}}</td>
                                    <td>{{number_format($cotizacion->viatico)}}</td>
                                    <td>
                                        {{number_format($cotizacion->valor_tiquete + $cotizacion->iva_vuelo + $cotizacion->otros_cargos + $cotizacion->valor_noche + $cotizacion->iva_hotel + $cotizacion->viatico)}}
                                    </td>
                                    @if($cotizacion->aprobacion == 1)
                                        <td>Selecionada</td>
                                    @else
                                        <td>Sin seleccionar</td>
                                    @endif

                                    <td class="td-actions text-right text-center">
                                        @foreach ($requests as $solicitud)
                                            @if($solicitud->state_id == 1 || $solicitud->state_id == 7)
                                                <a href="{{url('/admin/quotation/'.$cotizacion->id_quotations.'/edit')}}" rel="tooltip" title="Editar" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                        @endforeach
                                        @if ($cotizacion->img != "")
                                            <a href="{{url('/contizaciones/vuelo/'.$cotizacion->img)}}" target="_blank" rel="tooltip" title="Vuelo" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-fighter-jet"></i>
                                            </a>
                                        @else
                                            <a href="#" rel="tooltip" title="Vuelo" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-fighter-jet"></i>
                                            </a>
                                        @endif

                                        @if ($cotizacion->img_hotel != "")
                                            <a href="{{url('/contizaciones/Hotel/'.$cotizacion->img_hotel)}}" target="_blank" rel="tooltip" title="Hotel" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-building"></i>
                                            </a>
                                        @else
                                            <a href="#" rel="tooltip" title="Hotel" class="btn btn-link btn-simple btn-xs">
                                                <i class="fa fa-building"></i>
                                            </a>
                                        @endif
                                        
                                        <a href="{{url('/admin/quotation/'.$cotizacion->id_quotations.'/detailcotizacion')}}" rel="tooltip" title="Ver detalle cotización" class="btn btn-link btn-simple btn-xs">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @foreach ($requests as $solicitud)
                                            @if($solicitud->state_id == 1 || $solicitud->state_id == 7)
                                                <form method="GET" action="{{url('/mails/'.$cotizacion->id_quotations.'/quotation_email')}}">
                                                    <button type="submit" class="btn btn-link btn-simple btn-xs" title="Enviar cotización">
                                                        <i class="fa fa-paper-plane-o"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Aerolinea</th>
                                <th>Fecha</th>
                                <th>Total tiquete</th>
                                <th>Total hotel</th>
                                <th>Viaticos</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                                <th>Enviar</th>
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