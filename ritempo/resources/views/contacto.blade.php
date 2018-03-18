@extends('template.front')

@section('buscar')
<div class="" id="menubuscar">
                {!! Form::open(array('url'=>'busqueda','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                     <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchText" placeholder="Buscar Producto..." value="{{$searchText}}">
                                <span class="input-group-btn ">
                                    <button type="submit" class="btn btn-primary"> 
                                      <span class="glyphicon glyphicon-search"></span>
                                    Buscar </button>
                                </span>
                               <!-- <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar Producto</a>-->
                            </div>
                     </div>
                     {{Form::close()}}
                 </div>
 @endsection
   

	@section('contacto')
	@include('alerts.success')
<div class="container">
  <div class="row">
		<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
			<div class="panel">
            <h3 class="text-center">Contáctenos</h3>
      </div>	
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
        <div class="panel">
	
      {!!Form::open(array('route'=>'contacto.store','method'=>'POST'))!!}
            {{Form::token()}}
            <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre...">
            </div>
            <!--<div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Nombre...">
            </div>-->
            <div class="form-group">
                <label for="email"> Email:</label>
                 {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email....','required']) !!}
                 </div>
             
            <div class="form-group">
                  <label  for="descripcion">Consulta </label>
                  {{ Form::textarea('mensaje', null, ['class'=>'form-control','placeholder'=>'Motivo del contacto....','id'=>'message','required']) }}
              
            </div>
				 <div class="form-group">
                  <button   class="btn btn-success" type="submit">Enviar</button>
                </div>

                  {!!Form::close()!!}   
              </div>    
   		</div>
	 </div>
</div>
	@endsection	

  @section('menu')

<!-- menu -->
<!--<div class="container">-->

  <div class="row">
    <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <a class="toggleMenu" href="#">Menu</a>
    
    <ul class="nav" id="menu">
       @foreach($categoria as $cat)
        <li  class="test">
         
        <a >{{$cat->nombre}} </a>
        <ul>
          @foreach($cat->subcategorias as $sub)
          <li>
                <!--<a href="{{URL::action('SubcategoriaController@index',$sub->id_subcategoria)}}"> {{$sub->nombre}}</a> -->
          <a href="{{ URL::to('subcategoria/' . $sub->id_subcategoria ) }} "> {{$sub->nombre}}</a>
          </li>
          @endforeach 
        </ul>
      </li>

      @endforeach
    
      
      <li>
        <a>Puntos de venta</a>
        <ul>
           <li>
             <a href="{{ URL::to('show/' .'43') }}">Resto</a>
           </li>

        </ul>

      </li>
      <li>
        <a href="{{ URL::to('/servicio/') }}">Servicio Tecnico</a>
      </li>
      <li>
        <a href="{{ URL::to('/contacto/') }}">Contacto</a>
       
      </li>

       @yield('buscar')
      
    </ul>

    
    </div>

  </div>

   <!--</div>-->


    <!--</div>-->
@endsection