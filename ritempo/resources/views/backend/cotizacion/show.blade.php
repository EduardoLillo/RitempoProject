@extends ('backend.plantilla.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
	<h3>Cotizacion del cliente : {{ $cotizacion->nombre_cliente}}</h3>
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

		
			<strong>Id_Producto:</strong> {{ $cotizacion->id_producto}}<br><br>
            <strong>Nombre Producto:</strong> {{$cotizacion->producto->nombre}}<br><br>
            <strong>Estado:</strong> {{ $cotizacion->estado}}<br><br>
	        <strong>Email:</strong> {{$cotizacion->email}}<br><br>
			<strong>Telefono:</strong> {{ $cotizacion->telefono}}<br><br>
			<strong>Consulta:</strong> {{$cotizacion->consulta}}<br>
		
	</div>
	<div class="col-lg-6 col-md-2 col-sm-6 col-xs-6 ">
		{!!Form::model($cotizacion,['method'=>'PATCH','route'=>['cotizacion.update',$cotizacion->id_cotizacion]])!!}
            {{Form::token()}}
            
      
			<div class="form-group ">
                        <label for="servicio"> Elija un  Estado :</label>
                        {!! Form::select('cotizacion',['cotizado'=>'cotizado', 'no cotizado'=>'no cotizado'],null,['placeholder'=>'Seleccione el estado','required']) !!}    
            </div>
          
          
            <div class="form-group">
            	<button class="btn btn-lg  btn-primary btn-block" type="submit">Cambiar Estado</button>
            	<!--<button class="btn btn-danger" type="reset">Cancelar</button>-->
            </div>

			{!!Form::close()!!}		
	</div>

	</div>


@endsection
