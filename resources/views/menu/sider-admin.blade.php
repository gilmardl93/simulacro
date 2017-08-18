<div class="page-sidebar-wrapper">
<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        {!!Form::menu('Escritorio',route('home.index'),'icon-home','start')!!}
        @if($rol=='root')
            <li class="heading">
                <h3 class="uppercase">Sistema</h3>
            </li>
            <li class="nav-item  ">
                {!!Form::menulink('Configuracion','#','fa fa-cogs')!!}
                <ul class="sub-menu">
                    {!!Form::menu('Maestro',route('catalogo.gestion','maestro'))!!}
                    {!!Form::menu('Secuencia',route('admin.secuencia.index'))!!}
                    {!!Form::menu('Evaluacion',route('admin.evaluacion.index'))!!}
                    {!!Form::menu('Servicio',route('catalogo.gestion','servicio'))!!}
                    {!!Form::menu('Sedes',route('catalogo.gestion','sedes'))!!}
                </ul>
            </li>
            {!!Form::menu('Aulas',route('admin.aulas.index'),'fa fa-cubes')!!}
        @endif
        @if(str_contains($rol,['informes','root']))
            <li class="heading">
                <h3 class="uppercase">Modulos</h3>
            </li>
            {!!Form::menu('Usuarios',route('admin.users.index'),'icon-users')!!}
            {!!Form::menu('Participante',route('admin.pos.index'),'fa fa-users')!!}
        @endif
        @if(str_contains($rol,['administrador','root']))
            {!!Form::menu('Colegio',route('admin.colegios.index'),'fa fa-bank')!!}
            {!!Form::menu('Pagos',route('admin.pagos.index'),'fa fa-money')!!}
            {!!Form::menu('Editar Fotos',route('admin.fotos.index'),'fa fa-file-image-o')!!}
            {!!Form::menu('Padron',route('admin.padron.index'),'fa fa-database')!!}
            {!!Form::menu('Estadisticas',route('admin.estadistica.index'),'glyphicon glyphicon-object-align-bottom')!!}
        @endif
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
</div>
