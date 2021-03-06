@extends ('backend.plantilla.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto: {{ $producto->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->id_producto],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}" placeholder="Nombre...">
            </div>
           <div class="form-group">
            	<label for="descripcion">Descripción</label>
                <br>
            	
                {{ Form::textarea('descripcion',$producto->descripcion, ['class'=>'form-control ckeditor'],null) }}
               <!-- <textarea  cols="10" rows="10" name="descripcion" maxlength="500" class="form-control field" value="{{$producto->descripcion}}" placeholder="Descripción..."></textarea>-->

               <!-- <input type="text" name="descripcion" class="form-control" value="{{$producto->descripcion}}" placeholder="Descripción...">-->
            </div>

            <div class="form-group">
            	<label  for="marca">Marca </label>
            	<input type="text"  name="marca" class="form-control" value="{{$producto->marca}}" placeholder="Marca...">
            </div>
            
            <div class="form-group">
           <!-- <label for="categoria">Categoria a la que pertenece  :</label>-->

			{!! Form::label('nombre', 'Seleccione una Subcategoria   :') !!}
		
			{!! Form::select('subcategoria',$subcategoria,$producto->id_subcategoria,['class'=>'select2-container form-control select2','placeholder'=>'Seleccione Nombre de la subcategoria','required']) !!}
            </div>
            <div class="form-group">

                <label for="">Varias Imagenes</label>

                {!! Form::file('imagen[]',array('multiple'=>true)) !!}


            </div>
           
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection