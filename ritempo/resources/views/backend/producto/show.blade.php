@extends ('backend.plantilla.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
	<h3>Detalle Producto: {{ $producto->nombre}}</h3>
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
	<div class="col-lg-6 col-md-2 col-sm-6 col-xs-6 ">
		
			<strong>Nombre:</strong> {{$producto->nombre}}<br><br>
			<strong>Descripcion:</strong> {!!$producto->descripcion!!}<br><br>
			<strong>Marca:</strong> {{ $producto->marca}}<br><br>
			<strong>Subcategoria:</strong> {{ $producto->id_subcategoria}}<br>
		
	</div>
		
	<div class="col-lg-6 col-md-2 col-m-6 col-xs-6 ">

		@foreach($producto->imagenes as $img)
		
		

			

		<div class= "col-xs-12 col-sm-6 col-lg-3 col-md-4">
		<img src="{{URL::asset('/productos/'.$img->nombre)}}" class="img-responsive" >
		</div>

			
		@endforeach
  
        
	</div>


@endsection