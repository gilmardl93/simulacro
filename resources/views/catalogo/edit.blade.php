@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-sm-12">
		{!! Form::model($catalogo,['route'=>['catalogo.update',$catalogo],'method'=>'PUT']) !!}
				
				{!! Field::text('codigo',['label' => 'Ingresar Codigo','placeholder'=>'Ingresar Codigo']) !!}
				{!! Field::text('nombre',['label' => 'Ingresar Nombre del Cargo','placeholder'=>'Nombre del cargo']) !!}
				{!! Field::text('descripcion',['label' => 'Ingresar Descripción','placeholder'=>'Ingresar Descripción']) !!}
				{!! Field::text('valor',['label' => 'Ingresar Monto','placeholder'=>'Ingresar Monto']) !!}
            	<div class="col-sm-4">
					{!!Form::submit('Guardar',['class'=>'btn yellow-gold uppercase'])!!}
	            	<a href="{{ route('catalogo.index') }}" class="btn default">REGRESAR</a>
            	</div>
		{!! Form::close() !!}
	</div>
</div>

@stop

@section('title')
Credencial:CNE
@stop

@section('page-title')
Editar {{ Session::get('tablename') }}
@stop

@section('page-subtitle')
@stop

@section('sidebar')
@include(Auth::user()->menu)
@stop

@section('user-menu')
@include('menu.profile-admin')
@stop


@section('user-name')
{!!Auth::user()->name!!}
@stop


@section('user-img')
{!! asset('storage/fotos/'.Auth::user()->foto) !!}
@stop