@extends ('backend.plantilla.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
	<h3>Detalle Categoria: {{ $categoria->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			
	</div>
</div>	
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<p>
			<strong>Nombre:</strong> {{$categoria->nombre}}<br><br>
			<strong>Descripcion:</strong> {!!$categoria->descripcion!!}<br>
			
		</p>
	</div>
	
	</div>

@endsection