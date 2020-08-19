@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Lista de productos</h5>
                <a href="{{url('/admin/products/create')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Crear Producto</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>SAP</th>
                                <th>Linea</th>
                                <th>Formato</th>
                                <th>PVP</th>
                                <th>Grado</th>
                                <th>Área</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->nombre}}</td>
                                    <td>{{$product->cod_sap}}</td>
                                    <td>{{$product->linea}}</td>
                                    <td>{{$product->formato}}</td>
                                    <td>{{$product->pvp}}</td>
                                    <td>{{$product->grado}}</td>
                                    <td>{{$product->area}}</td>

                                    <td class="td-actions text-right text-center">
                                        <a href="{{url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>SAP</th>
                                <th>Linea</th>
                                <th>Formato</th>
                                <th>PVP</th>
                                <th>Grado</th>
                                <th>Área</th>
                                <th></th>
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
