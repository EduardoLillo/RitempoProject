@extends ('backend.plantilla.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'admin/producto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	{{ Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre....','required']) }}
            </div>
            <div class="form-group">
            	<label  for="descripcion">Descripción </label>
            	{{ Form::textarea('descripcion', null, ['class'=>'form-control ckeditor','placeholder'=>'Descripcion....','required']) }}
              
            </div>
            <div class="form-group">
            	<label  for="marca">Marca </label>
            	{{ Form::text('marca', null, ['class'=>'form-control','placeholder'=>'Marca....']) }}
            </div>
            
            <div class="form-group">
            {!! Form::label('id_subcategoria', 'Seleccione una Subcategoria   :') !!}
		
			{!! Form::select('subcategoria',$subcategoria,null,['class'=>'select2-container form-control select2','placeholder'=>'Seleccione Nombre de la subcategoria','required']) !!}                

        	</div>     

       
            <div class="form-group">

                <label for="">Varias Imagenes</label>

                {!! Form::file('imagen[]',array('multiple'=>true,'id'=>'myfile','required')) !!}

            </div>
   				  
            <div class="form-group">
            	<button   class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset" onclick="">Cancelar</button>
            	</div>
            	
            </div>

			{!!Form::close()!!}		
   
		</div>
	</div>

	@endsection