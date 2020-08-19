@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<div id="wrapper">
    @include('includes.menu_lateral')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            @include('includes.menu_superior')
        </div>

        <div class="row  border-bottom white-bg dashboard-header">
            <div class="table-responsive">
                
            </div>
        </div>
    </div>
</div>

@endsection
