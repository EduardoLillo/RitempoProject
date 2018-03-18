@extends ('backend.plantilla.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Productos <a href="{{URL::action('backend\ProductoController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('backend.producto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<!--<th>Descripcion</th>-->
					<th>marca</th>
					<th>Subcategoria</th>
				</thead>
               @foreach ($productos as $pro)
				<tr>
					<td>{{ $pro->id_producto}}</td>
					<td>{{ $pro->nombre}}</td>
					<!--<td>{{$pro->descripcion}}</td>-->
					<td>{{ $pro->marca}}</td>
					<td>{{ $pro->id_subcategoria}}</td>
					<td>
						<a href="{{URL::action('backend\ProductoController@edit',$pro->id_producto)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$pro->id_producto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                       <!--  <a href="{{ URL::to('producto/' . $pro->id_producto) }}"  ><button class="btn btn-primary btn-info">Ver Detalle  </button></a>-->
                       <a href="{{URL::action('backend\ProductoController@show',$pro->id_producto)}}"  ><button class="btn btn-primary btn-info">Ver</button></a>

                       
					</td>
				</tr>
				@include('backend.producto.modal')
				@endforeach
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>

@endsection

