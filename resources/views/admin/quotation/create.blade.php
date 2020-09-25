@extends('layouts.app')

@section('title', 'Crear cotización')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Crear cotización</h5>
                <a href="{{url('/admin/quotation/'.$id.'/index')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Cancelar</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="ibox float-e-margins">
                    <div class="row">
                        <form method="POST" action="{{url('/admin/quotation/'.$id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Aerolínea</label>
                                    <input type="text" name="aerolinea" class="form-control" value="{{old('aerolinea')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Valor tiquete</label>
                                    <input type="number" name="valor_tiquete" class="form-control" value="{{old('valor_tiquete')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Iva vuelo</label>
                                    <input type="number" name="iva_vuelo" class="form-control" value="{{old('iva_vuelo')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Otros cargos</label>
                                    <input type="number" name="otros_cargos" class="form-control" value="{{old('otros_cargos')}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Fecha</label>
                                    <input type="date" name="fecha" class="form-control" value="{{old('fecha')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Hora</label>
                                    <input type="time" name="hora" class="form-control" value="{{old('hora')}}">
                                    <input type="hidden" name="id" value="{{$id}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cabina</label>
                                    <input type="text" name="cabina" class="form-control" value="{{old('cabina')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Archivo</label>
                                    <input type="file" name="img" class="form-control" value="{{old('img')}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <br><h3 style="text-align: center;">Información hospedaje</h3>
                                <div class="form-group col-md-3">
                                    <label>Valor hotel</label>
                                    <input type="number" name="valor_noche" class="form-control" value="{{old('valor_noche')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Iva hotel</label>
                                    <input type="number" name="iva_hotel" class="form-control" value="{{old('iva_hotel')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Valor viaticos</label>
                                    <input type="number" name="viaticos" class="form-control" value="{{old('viaticos')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Archivo</label>
                                    <input type="file" name="img_hotel" class="form-control" value="{{old('img_hotel')}}">
                                </div>
                            </div>

                            <div class="col-md-12">
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

@endsection