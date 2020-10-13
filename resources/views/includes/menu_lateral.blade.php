<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img" src="{{asset('img/admin.png')}}" /><br><br>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> 
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->name }} {{ Auth::user()->last_name }}<b class=""></b></strong>
                            </span>
                        </span>
                    </a>
                </div>
            </li>

            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Inicio</span></a>
            </li>
            <li>
                <a href="{{url('/request')}}"><i class="fa fa-clipboard"></i> <span class="nav-label">Solicitudes</span></a>
            </li>
            @if (auth()->user()->role_id == 1)
                <li>
                    <a href="{{url('/estados')}}"><i class="fa fa-window-restore"></i> <span class="nav-label">Estados</span></a>
                </li>
                <li>
                    <a href="{{url('/estados/pendiente')}}"><i class="fa fa-plane"></i> <span class="nav-label">Pendientes</span></a>
                </li>
                <li>
                    <a href="{{url('/estados/aprobado')}}"><i class="fa fa-check"></i> <span class="nav-label">Aprobados</span></a>
                </li>
                <li>
                    <a href="{{url('/admin/quotation/quotations')}}"><i class="fa fa-suitcase"></i> <span class="nav-label">Cotizaciones</span></a>
                </li>
            @endif

            <!--<li>
                <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Reportes</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-folder-open"></i> <span class="nav-label"> Abrir Solicitud</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-thumb-tack"></i> <span class="nav-label">Auditoria</span></a>
            </li>-->

            <!--<li>
                <a href='#'><i class="fa fa-dashboard"></i> <span class='nav-label'>Viajes</span></a>
                <ul class='nav nav-second-level collapse'>
                    <li><a href='#'>Sub menu</a></li>
                </ul>
            </li>-->
        </ul>
    </div>
</nav>