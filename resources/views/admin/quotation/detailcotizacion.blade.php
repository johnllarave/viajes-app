@extends('layouts.app')

@section('title', 'Detalle cotización')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Detalle de la cotización</h5>
                <a href="{{url('/estados')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Cancelar</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="ibox float-e-margins">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-3">
                                <label>Aerolínea</label>
                                <input class="form-control" value="{{$quotation->aerolinea}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Valor tiquete</label>
                                <input class="form-control" value="{{$quotation->valor_tiquete}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Iva vuelo</label>
                                <input class="form-control" value="{{$quotation->iva_vuelo}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Otros cargos</label>
                                <input class="form-control" value="{{$quotation->otros_cargos}}" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group col-md-3">
                                <label>Fecha</label>
                                <input class="form-control" value="{{$quotation->fecha}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Hora</label>
                                <input class="form-control" value="{{$quotation->hora}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Cabina</label>
                                <input class="form-control" value="{{$quotation->cabina}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Archivo</label>
                                <span> (documento actual
                                    <a href="{{url('/contizaciones/vuelo/'.$quotation->img)}}" target="_blank" rel="tooltip" title="Documento" class="btn btn-link btn-simple btn-xs">
                                        <i class="fa fa-vcard-o"></i>
                                    </a>)
                                </span>
                                <input class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br><h3 style="text-align: center;">Información hospedaje</h3>
                            <div class="form-group col-md-3">
                                <label>Valor hotel</label>
                                <input class="form-control" value="{{$quotation->valor_noche}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Iva hotel</label>
                                <input class="form-control" value="{{$quotation->iva_hotel}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Valor viaticos</label>
                                <input class="form-control" value="{{$quotation->viaticos}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Archivo</label>
                                <span> (documento actual
                                    <a href="{{url('/contizaciones/hotel/'.$quotation->img)}}" target="_blank" rel="tooltip" title="Documento" class="btn btn-link btn-simple btn-xs">
                                        <i class="fa fa-vcard-o"></i>
                                    </a>)
                                </span>
                                <input class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection