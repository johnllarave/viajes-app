@extends('layouts.app')

@section('title', 'Editar cotización')

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
                <a href="{{url('/admin/quotation/'.$quotation->requests_id.'/index')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Cancelar</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="ibox float-e-margins">
                    <div class="row">
                        <form method="POST" action="{{url('/admin/quotation/'.$quotation->id.'/edit')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Aerolínea</label>
                                    <input type="text" name="aerolinea" class="form-control" value="{{$quotation->aerolinea}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Valor tiquete</label>
                                    <input type="number" name="valor_tiquete" class="form-control" value="{{$quotation->valor_tiquete}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Iva vuelo</label>
                                    <input type="number" name="iva_vuelo" class="form-control" value="{{$quotation->iva_vuelo}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Otros cargos</label>
                                    <input type="number" name="otros_cargos" class="form-control" value="{{$quotation->otros_cargos}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Fecha</label>
                                    <input type="date" name="fecha" class="form-control" value="{{$quotation->fecha}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Hora</label>
                                    <input type="time" name="hora" class="form-control" value="{{$quotation->hora}}">
                                    <input type="hidden" name="id" value="{{$quotation->requests_id}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cabina</label>
                                    <input type="text" name="cabina" class="form-control" value="{{$quotation->cabina}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Archivo</label>
                                    <span> (documento actual
                                        <a href="{{url('/contizaciones/vuelo/'.$quotation->img)}}" target="_blank" rel="tooltip" title="Documento" class="btn btn-link btn-simple btn-xs">
                                            <i class="fa fa-vcard-o"></i>
                                        </a>)
                                    </span>
                                    <input type="file" name="img" class="form-control" value="{{$quotation->img}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <br><h3 style="text-align: center;">Información hospedaje</h3>
                                <div class="form-group col-md-3">
                                    <label>Valor hotel</label>
                                    <input type="number" name="valor_noche" class="form-control" value="{{$quotation->valor_noche}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Iva hotel</label>
                                    <input type="number" name="iva_hotel" class="form-control" value="{{$quotation->iva_hotel}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Valor viaticos</label>
                                    <input type="number" name="viaticos" class="form-control" value="{{$quotation->viaticos}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Archivo</label>
                                    <span> (documento actual
                                        <a href="{{url('/contizaciones/hotel/'.$quotation->img)}}" target="_blank" rel="tooltip" title="Documento" class="btn btn-link btn-simple btn-xs">
                                            <i class="fa fa-vcard-o"></i>
                                        </a>)
                                    </span>
                                    <input type="file" name="img_hotel" class="form-control" value="{{$quotation->img_hotel}}">
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