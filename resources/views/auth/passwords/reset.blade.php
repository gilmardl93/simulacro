@extends('layouts.login')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div id="form-opcion">
    {!! Form::open(['url'=>'/password/reset','method'=>'POST','id'=>'form-login']) !!}
        <h3 class="form-title font-green">Reiniciar su Clave</h3>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::hidden('token', $token) !!}
            {!!Form::label('lblEmail', 'Email');!!}
            {!!Form::email('email', null , ['class'=>'form-control','placeholder'=>'Name']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('lblPassword', 'Clave');!!}
            {!!Form::password('password', ['class'=>'form-control','placeholder'=>'Clave']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('lblPassword', 'Confirmar Clave');!!}
            {!!Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Repetir Clave']);!!}
        </div>
        <div class="form-actions">
        </div>
        <div class="create-account">
            {!!Form::submit('Entrar',['class'=>'btn green uppercase btn-block'])!!}
        </div>
    {!! Form::close() !!}
    </div>




@stop



@section('copyright')
Oficina Central de Admision. Universidad Nacional de Ingeniería
@stop