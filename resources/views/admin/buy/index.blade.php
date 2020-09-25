@extends('layouts.app')

@section('title', 'Crear compra')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Ingresar información de la compra</h5>
                <a href="{{url('/estados/pendiente')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Cancelar</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="ibox float-e-margins">
                    <div class="row">
                        <form method="POST" action="{{url('/compra/'.$id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label>Medio</label>
                                    <select class="form-control" name="medio">
                                        <option></option>
                                        <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                                        <option value="Compra directa">Compra directa</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Total vuelo</label>
                                    <input type="number" name="total_vuelo" class="form-control" value="{{old('total_vuelo')}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Total hotel</label>
                                    <input type="number" name="total_hotel" class="form-control" value="{{old('total_hotel')}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label>Reserva vuelo</label>
                                    <input type="text" name="reserva_vuelo" class="form-control" value="{{old('reserva_vuelo')}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Reserva hotel</label>
                                    <input type="text" name="reserva_hotel" class="form-control" value="{{old('reserva_hotel')}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Archivo</label>
                                    <input type="file" name="img_compra" class="form-control" value="{{old('img_compra')}}">
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