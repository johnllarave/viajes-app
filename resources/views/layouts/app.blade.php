<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">

    <title>@yield('title', 'Login')</title>

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!--- fuente predeterminada SM --->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!--- plugins de la plantilla --->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/footable/footable.core.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
</head>

<body class="@yield('body-class')">
    @yield('content')

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <!--<script src="{{asset('js/material.min.js')}}"></script>-->

    <!--- plugins de la plantilla --->
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/plugins/gritter/jquery.gritter.css')}}"></script>
    <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <!--<script src="{{asset('js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>-->
    <script src="{{asset('js/plugins/toastr/toastr.min.js')}}"></script>
</body>

</html>