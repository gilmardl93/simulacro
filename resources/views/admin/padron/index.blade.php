@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN Portlet PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Participante </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a class="reload actualizar"> </a>
                <a href="" class="fullscreen"> </a>
                <a href="javascript:;" class="remove"> </a>
            </div>
        </div>
        <div class="portlet-body">
        <p></p>
            <div class="table-response">
            </br>
                <table class="table table-striped table-bordered table-hover Postulantes">
                    <thead>
                        <tr>
                            <th> Periodo </th>
                            <th> Proceso </th>
                            <th> Codigo </th>
                            <th> Paterno </th>
                            <th> Materno </th>
                            <th> Nombres </th>
                            <th> DNI </th>
                            <th> Fecha Nacimiento </th>
                            <th> Sexo </th>
                            <th> Ubigeo </th>
                            <th> Direccion </th>
                            <th> Email </th>
                            <th> Telefono </th>
                            <th> Grado </th>
                            <th> Sede </th>
                            <th> Nombre Colegio </th>
                            <th> Direccion Colegio </th>
                            <th> Gestion Colegio </th>
                            <th> Ubigeo Colegio </th>
                            <th> Codigo Especialidad </th>
                            <th> Nombre Especialidad </th>
                            <th> Aula </th>
                            <th> Sector </th>
                            <th> Pago </th>
                            <th> Anulado </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Lista as $padron)
                        <tr>
                            <td> {{ $padron->datos_evaluacion->codigo }} </td>
                            <td> {{ $padron->datos_evaluacion->nombre }} </td>
                            <td> {{ $padron->codigo }} </td>
                            <td> {{ $padron->paterno }} </td>
                            <td> {{ $padron->materno }} </td>
                            <td> {{ $padron->nombres }} </td>
                            <td> {{ $padron->dni }} </td>
                            <td> {{ $padron->fecha_nacimiento }} </td>
                            <td> {{ $padron->sexo }} </td>
                            <td> {{ $padron->descripcion_ubigeo }} </td>
                            <td> {{ $padron->direccion }} </td>
                            <td> {{ $padron->email }} </td>
                            <td> {{ $padron->telefono }} </td>
                            <td> {{ $padron->grado }} </td>
                            <td> {{ $padron->sede }} </td>
                            <td> {{ $padron->datos_colegio->nombre }} </td>
                            <td> {{ $padron->datos_colegio->direccion }} </td>
                            <td> {{ $padron->datos_colegio->gestion }} </td>
                            <td> {{ $padron->datos_colegio->descripcion_ubigeo }} </td>
                            <td> {{ $padron->codigo_especialidad }} </td>
                            <td> {{ $padron->nombre_especialidad }} </td>
                            <td> {{ $padron->datos_aula->codigo }} </td>
                            <td> {{ $padron->datos_aula->sector }} </td>
                            <td> {{ $padron->ha_pagado }} </td>
                            <td> {!! $padron->estado_anulado !!} </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Portlet PORTLET-->
	</div><!--span-->
</div><!--row-->
@stop

@section('js-scripts')
<script>
$(function(){
    $('.Postulantes').DataTable({
        "language": {
            "emptyTable": "No hay datos disponibles",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
            "search": "Buscar Postulante :",
            "lengthMenu": "_MENU_ registros"
        },
        responsive: true,
        dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        buttons: [
                    { extend: 'excel', className: 'btn yellow btn-outline ' },
                    { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                ],
        "bProcessing": true,
        "pagingType": "bootstrap_full_number",

    });

});

</script>
@stop


@section('plugins-styles')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
@stop




@section('menu-user')
@include('menu.profile-admin')
@stop

@section('sidebar')
@include(Auth::user()->menu)
@stop


@section('user-name')
{!!Auth::user()->dni!!}
@stop

@section('breadcrumb')

@stop


@section('title')
Padron
@stop
@section('page-title')

@stop

@section('page-subtitle')
@stop



