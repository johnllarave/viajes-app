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
                        <form method="POST" action="{{url('/admin/quotation/'.$id)}}">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label>Vuelo</label>
                                    <input type="text" name="vuelo" class="form-control" value="{{old('vuelo')}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Aerolínea</label>
                                    <input type="text" name="aerolinea" class="form-control" value="{{old('aerolinea')}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Hotel</label>
                                    <input type="text" name="hotel" class="form-control" value="{{old('hotel')}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label>Viaticos</label>
                                    <input type="text" name="viaticos" class="form-control" value="{{old('viaticos')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Alimento</label>
                                    <input type="text" name="alimento" class="form-control" value="{{old('alimento')}}">
                                    <input type="hidden" name="id" value="{{$id}}">
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