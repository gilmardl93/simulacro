@extends('layouts.base')

@section('content')
{!! Alert::render() !!}
<div class="col-md-12">
    <!-- BEGIN PORTLET-->
    <div class="portlet light tasks-widget widget-comments">
        <div class="portlet-title margin-bottom-20">
            <div class="caption caption-md font-red-sunglo">
                <span class="caption-subject theme-font bold uppercase">FICHA DE INSCRIPCION</span>
            </div>
            <div class="actions">
                {!!Form::back(route('home.index'))!!}
            </div>
        </div>
        <div class="form-body ">
            <div class="Pulsear" id="pulsate-regular" style="padding:5px;">
                Su numero de Inscripción y su aula, donde rendirá su examen aparecera en su ficha cuando se haya registrado su pago satisfactoriamente
            </div>
            <p></p>
            <iframe src="{{route('ficha.pdf',$id)}}" width="100%" height="700px" scrolling="auto"></iframe>
        </div>
    </div>
    <!-- END PORTLET-->
</div>

@stop


