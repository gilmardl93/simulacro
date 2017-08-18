@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span >{{ $total_inscritos }}</span>
                </div>
                <div class="desc"> Inscritos </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $total_pagantes }}</span> </div>
                <div class="desc"> Pagantes </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $total_inscritos_lima }}</span> </div>
                <div class="desc"> Inscritos Lima </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $total_inscritos_hyo }}</span> </div>
                <div class="desc"> Inscritos Hyo </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 yellow" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $total_pagantes_l }}</span> </div>
                <div class="desc"> Pagantes Lima </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green-meadow" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>{{ $total_pagantes_h }}</span> </div>
                <div class="desc"> Pagantes Hyo </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 ">
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption">
                    <i class="icon-bubbles font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Avance</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-3">
                    Cantidad de Inscritos
                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th> Fecha </th>
                                    <th> cantidad </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Total </th>
                                    <th>  {{ $total_inscritos }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($resumen as $item)
                                    <tr>
                                        <td><strong> {{ $item->fecha_registro }} </strong></td>
                                        <td> {{ $item->cantidad }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $resumen->links() }}
                    </div>
                    <div class="col-md-3">
                    Cantidad de Pagantes
                        <table class="table table-bordered table-hover"  data-pagination="true" >
                            <thead>
                                <tr>
                                    <th> Fecha </th>
                                    <th> cantidad </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Total </th>
                                    <th> {{ $total_pagantes }} </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($pagantes as $item)
                                    <tr>
                                        <td><strong> {{ $item->fecha }} </strong></td>
                                        <td> {{ $item->cantidad }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pagantes->links() }}
                    </div>
                    <div class="col-md-3">
                    Inscritos de Lima
                        <table class="table table-bordered table-hover"  data-pagination="true" >
                            <thead>
                                <tr>
                                    <th> Fecha </th>
                                    <th> cantidad </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Total </th>
                                    <th> {{ $total_inscritos_lima }} </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($resumenSede as $item)
                                    <tr>
                                        <td><strong> {{ $item->fecha_registro }} </strong></td>
                                        <td> {{ $item->cantidad }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pagantes->links() }}
                    </div>
                    <div class="col-md-3">
                    Inscritos de Huancayo
                        <table class="table table-bordered table-hover"  data-pagination="true" >
                            <thead>
                                <tr>
                                    <th> Fecha </th>
                                    <th> cantidad </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Total </th>
                                    <th> {{ $total_inscritos_hyo }} </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($resumenSedeH as $item)
                                    <tr>
                                        <td><strong> {{ $item->fecha_registro }} </strong></td>
                                        <td> {{ $item->cantidad }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pagantes->links() }}
                    </div>
                    <div class="col-md-3">
                    Cantidad de Pagantes Sede Lima
                        <table class="table table-bordered table-hover"  data-pagination="true" >
                            <thead>
                                <tr>
                                    <th> Fecha </th>
                                    <th> cantidad </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Total </th>
                                    <th> {{ $total_pagantes_l }} </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($pagantes_sl as $item)
                                    <tr>
                                        <td><strong> {{ $item->fecha }} </strong></td>
                                        <td> {{ $item->cantidad }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pagantes->links() }}
                    </div>
                    <div class="col-md-3">
                    Cantidad de Pagantes Sede Huancayo
                        <table class="table table-bordered table-hover"  data-pagination="true" >
                            <thead>
                                <tr>
                                    <th> Fecha </th>
                                    <th> cantidad </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th> Total </th>
                                    <th> {{ $total_pagantes_h }} </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($pagantes_sh as $item)
                                    <tr>
                                        <td><strong> {{ $item->fecha }} </strong></td>
                                        <td> {{ $item->cantidad }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pagantes->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('plugins-styles')
{!! Html::style('assets/global/plugins/bootstrap-table/bootstrap-table.min.css') !!}
@stop

@section('plugins-js')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-table/bootstrap-table.min.js') !!}
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


@section('page-title')
Panel de Administracion
@stop

@section('page-subtitle')
@stop




