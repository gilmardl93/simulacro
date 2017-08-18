@extends('layouts.base')

@section('content')
{!! Alert::render() !!}
@include('alerts.errors')
<div class="row widget-row">
    <div class="col-md-12">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white margin-bottom-20 ">
            <h4 class="widget-thumb-heading">Contactanos</h4>
            <div class="widget-thumb-wrap">
                <div class="widget-thumb-body">
                    Oficina Central de Admisión
                    </br>Túpac Amaru 210 Rímac
                    </br><strong>Telefonos:</strong> 481-10-70 anexo 253 | 482-3804
                    </br><strong>Email:</strong> informes@admisionuni.edu.pe
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
</div>

@stop
@section('js-scripts')
<script>
$(function(){
    function Recarga(){
        $('.tab-content').load('listar');
    }
        $('.tab-content').load('listar');
    //setInterval(Recarga, 1000);
})
</script>
@stop

@section('plugins-styles')
{!! Html::style(asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
{!! Html::style(asset('assets/global/plugins/icheck/skins/all.css')) !!}
{!! Html::style(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')) !!}
@stop
@section('plugins-js')
{!! Html::script(asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/select2.full.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/select2/js/i18n/es.js')) !!}
{!! Html::script(asset('assets/global/plugins/icheck/icheck.min.js')) !!}
{!! Html::script(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')) !!}
@stop
