@extends('layouts.app')

@section('title', 'Edición de Productos')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>Editar producto</h5>
                <a href="{{url('/admin/products')}}">
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Cancelar</strong></button>
                </a>
            </div>
            <div class="ibox-content">
                <div class="ibox float-e-margins">
                    <div class="row">
                        <form method="POST" action="{{url('/admin/products/'.$product->id.'/edit')}}">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{$product->nombre}}">
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Código SAP</label>
                                    <input type="number" name="cod_sap" class="form-control" value="{{$product->cod_sap}}">
                                    @error('cod_sap')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                @php
                                    $array_linea = array('TEXTO' => 'Texto',
                                                         'LITERATURA' => 'Literatura',
                                                         'UDP' => 'UDP');
                                @endphp
                                <div class="form-group col-md-3">
                                    <label>Línea</label>
                                    <select name="linea" class="form-control">
                                        @foreach ($array_linea as $value => $name)
                                            @if ($product->linea == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('linea')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                @php
                                    $array_formato = array('TEXTO Y DIGITAL' => 'Texto y digital',
                                                           'TEXTO PAPEL' => 'Texto papel',
                                                           'DIGITAL PURO' => 'Digital puro');
                                @endphp
                                <div class="form-group col-md-3">
                                    <label>Formato</label>
                                    <select name="formato" class="form-control">
                                        @foreach ($array_formato as $value => $name)
                                            @if ($product->formato == $value)
                                                <option value="{{$value}}" selected>{{$name}}</option>
                                            @else
                                                <option value="{{$value}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('formato')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>PVP</label>
                                    <input type="number" name="pvp" class="form-control" value="{{$product->pvp}}">
                                    @error('pvp')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Grado</label>
                                    <input type="text" name="grado" class="form-control" value="{{$product->grado}}">
                                    @error('grado')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Área</label>
                                    <input type="text" name="area" class="form-control" value="{{$product->area}}">
                                    @error('area')
                                        <span class="invalid-feedback" role="alert">
                                            <i style="color: red; font-size: 0.8em;"><b>{{ $message }}</b></i>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary pull-right m-t-n-xs">
                                        <strong>Actualizar</strong>
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