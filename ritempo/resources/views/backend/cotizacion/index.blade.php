@extends ('backend.plantilla.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cotizaciones :</h3>
		@include('backend.cotizacion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Cotizacion</th>
					<th>Id Producto</th>
					<th>Nombre Cliente</th>
					<th>Estado</th>

					
					
					
				</thead>
               @foreach ($cotizaciones as $cot)
				<tr>
					<td>{{ $cot->id_cotizacion}}</td>
					<td>{{ $cot->id_producto}}</td>
					<td>{{ $cot->nombre_cliente}}</td>
					<td>{{ $cot->estado}}</td>
			
					<td>
						
                        <a href="" data-target="#modal-delete-{{$cot->id_cotizacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                       
                       <a href="{{URL::action('backend\CotizacionController@show',$cot->id_cotizacion)}}"  ><button class="btn btn-primary btn-info">Ver/Cotizar</button></a>

                       
					</td>
				</tr>
				@include('backend.cotizacion.modal')
				@endforeach
			</table>
		</div>
		{{$cotizaciones->render()}}
	</div>
</div>

@endsection
