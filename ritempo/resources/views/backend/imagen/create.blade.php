@extends ('backend.plantilla.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva SubCategoría</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'subcategoria','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label  for="descripcion">Descripción </label>
            	<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
            </div>
            <div class="form-group">
           <!-- <label for="categoria">Categoria a la que pertenece  :</label>-->

			{!! Form::label('id_categoria', 'Seleccion una Categoria   :') !!}
		
			{!! Form::select('categoria',$categoria,null,['class'=>'select2-container form-control select2','placeholder'=>'Seleccione Nombre de Categoria','required']) !!}

        	</div>        				  
            <div class="form-group">
            	<button   class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            	</div>
            	
            </div>

			{!!Form::close()!!}		
   
		</div>
	</div>
	
	@endsection