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
                <h5>Total de cotizaciones - Tabla pendiente para los reportes</h5>
            </div>
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
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($quotations as $cotizacion)
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