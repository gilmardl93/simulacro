@extends('layouts.login')

@section('content')
    @include('alerts.errors')
{!! Form::open(['url'=>'register','method'=>'POST']) !!}
    <h3 class="form-title font-green">Crear Cuenta</h3>
    <div class="form-group">
            {!! Form::label('lblDNI', 'Ingrese su numero de DNI', []) !!}
            <div class="input-icon right ">
            <i class="fa fa-envelope"></i>
            {!!Form::text('dni',old('dni'), ['class'=>'form-control','placeholder'=>'dni'])!!}
            </div>
    </div>
    <div class="form-group">
            {!! Form::label('lblPassword', 'Ingrese su Clave', []) !!}
        <div class="input-icon right ">
            <i class="fa fa-lock"></i>
            {!!Form::password('password', ['class'=>'form-control','placeholder'=>'Clave'])!!}
        </div>
            {!! Form::label('lblPassword2', 'Ingrese nuevamente su Clave', []) !!}
        <div class="input-icon right ">
            <i class="fa fa-lock"></i>
            {!!Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Clave'])!!}
        </div>
    </div>
    <div class="form-actions">
        {!!Form::submit('Crear',['class'=>'btn green uppercase btn-block'])!!}
    </div>
    <div class="create-account">
    {!!Form::back(url('/'))!!}
    </div>
{!! Form::close() !!}
@stop

@section('copyright')
Oficina Central de Admision. Universidad Nacional de Ingeniería
@stop