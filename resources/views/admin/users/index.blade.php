@extends('layouts.admin')

@section('content')
{!! Alert::render() !!}
<div class="row">
	<div class="col-md-8">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-table"></i>
					Usuarios
				</div>
			</div>
			<div class="portlet-body">
				<a href="#myModalNewUser" data-toggle="modal" class="btn blue margin-bottom-20">
					<i class="fa fa-plus"></i>
					<i class="fa fa-user"></i>
				</a>
					<table class="table table-striped table-hover table-bordered" id="Usuarios">
						<thead>
							<tr>
								<th>DNI</th>
								<th>Email</th>
								<th>foto</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($Lista as $item)
							<tr>
								<td>{{ $item->dni }}</td>
								<td>{{ $item->email }}</td>
								<td><img src="{{ $item->mostrar_foto }}" width='25px'></td>
								<td>
									<a href="{{ route('admin.users.edit',$item->id) }}" title="Editar"class="btn btn-icon-only green-haze" >
										<i class="fa fa-edit"></i>
									</a>
									<a href="{{ route('admin.users.show',$item->id) }}" title="Eliminar" class="btn -btn-icon-only red">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

			</div>

		</div>
	</div>
</div>
@include('admin.users.modals.create')
@stop

@section('js-scripts')
<script>
$('#Usuarios').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar Usuarios :",
        "lengthMenu": "_MENU_ registros"
    },
    "pagingType": "bootstrap_full_number",

});

$('#Postulantes').dataTable({
    "bProcessing": true,
    "sAjaxSource": '{{ url('carga/postulante/list') }}',
    "columnDefs": [
                {  // set default column settings
                    'orderable': false,
                    'targets': '_all'
                },
                {
                    'targets':5,
                    'render': function ( data, type, full, meta ) {
                      return '<a href="postulante/'+data+'/edit" title="Editar"class="btn btn-icon-only green-haze" ><i class="fa fa-edit"></i></a>';
                    }
                }
            ],
    "columns": [
            { "data": "codigo","defaultContent": "" },
            { "data": "nombrecompleto","defaultContent": "" },
            { "data": "modalidad","defaultContent": "" },
            { "data": "aula","defaultContent": "" },
            { "data": "sector","defaultContent": "" },
            { "data": "id","defaultContent": "" },
        ],
    "order": [1,"asc"]
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

@section('user-img')
{{ asset('/storage/fotos/'.Auth::user()->foto) }}
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

@section('page-title')
@stop

@section('page-subtitle')

@stop


