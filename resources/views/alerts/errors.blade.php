@if (count($errors) > 0)
	<div class="alert alert-danger">
		Datos incorrectos<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif