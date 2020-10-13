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
                            @if ($compra != 0)
                                @foreach ($buy as $compras)
                                    <div class="col-md-12">
                                        @php
                                            $array_medio = array('' => '',
                                                                 'Tarjeta de crédito' => 'Tarjeta de crédito',
                                                                 'Compra directa' => 'Compra directa');
                                        @endphp
                                        <div class="form-group col-md-4">
                                            <label>Medio</label>
                                            <select class="form-control" name="medio">
                                                @foreach ($array_medio as $value => $name)
                                                    @if ($compras->medio == $value)
                                                        <option value="{{$value}}" selected>{{$name}}</option>
                                                    @else
                                                        <option value="{{$value}}">{{$name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Total vuelo</label>
                                            <input type="number" name="total_vuelo" class="form-control" value="{{$compras->total_vuelo}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Total hotel</label>
                                            <input type="number" name="total_hotel" class="form-control" value="{{$compras->total_hotel}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group col-md-3">
                                            <label>Reserva vuelo</label>
                                            <input type="text" name="reserva_vuelo" class="form-control" value="{{$compras->reserva_vuelo}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Reserva hotel</label>
                                            <input type="text" name="reserva_hotel" class="form-control" value="{{$compras->reserva_hotel}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Archivo</label>
                                            <span> (documento actual
                                                <a href="{{url('/img/compra/'.$compras->img_compra)}}" target="_blank" rel="tooltip" title="Documento" class="btn btn-link btn-simple btn-xs">
                                                    <i class="fa fa-vcard-o"></i>
                                                </a>)
                                            </span>
                                            <input type="file" name="img_compra" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Valor viaticos</label>
                                            <input type="text" name="valor_viatico" class="form-control" value="{{$compras->valor_viatico}}">
                                        </div>
                                    </div>
                                @endforeach
                            @else
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
                                    <div class="form-group col-md-3">
                                        <label>Reserva vuelo</label>
                                        <input type="text" name="reserva_vuelo" class="form-control" value="{{old('reserva_vuelo')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Reserva hotel</label>
                                        <input type="text" name="reserva_hotel" class="form-control" value="{{old('reserva_hotel')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Archivo</label>
                                        <input type="file" name="img_compra" class="form-control" value="{{old('img_compra')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Valor viaticos</label>
                                        <input type="text" name="valor_viatico" class="form-control" value="{{old('valor_viatico')}}">
                                    </div>
                                </div>
                            @endif
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