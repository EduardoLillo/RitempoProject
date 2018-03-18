
@extends ('template.front')


@section('buscar')
<div class="" id="menubuscar">
                {!! Form::open(array('url'=>'busqueda','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                     <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchText" placeholder="Buscar Producto..." value="{{$searchText}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                      <span class="glyphicon glyphicon-search"></span>
                                    Buscar </button>
                                </span>
                            </div>
                     </div>
                     {{Form::close()}}
                 </div>
 @endsection


@section('imagencot1')
    
   <div class="container-fluid">
    <div class="card">
      <div class="container-fluid">
        <div class="wrapper row">
       
          <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-12 ">

          
                  @if (count($errors)>0)
            <div class="alert alert-danger">
              <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
              </ul>
            </div>
            @endif
                   
          
          <div class="fotorama panel panel-body  " data-width="700" data-ratio="700/467" data-max-width="100%"  data-allowfullscreen="true"  data-nav="thumbs" data-arrows="true" id="showpro1">
          @foreach($producto->imagenes as $img)
          <img class="" src="{{URL::asset('/productos/'.$img->nombre)}}">
        
          @endforeach
         
          </div>
          </div>
          
                
                <div  class=" col-lg-4 col-md-4 col-sm-6 col-xs-12 panel panel-body" id="showpro1">
                      <h4 class="text-center">{{$producto->nombre}}</h4>
                       <h4 class="text-center">{{$producto->marca}}</h4>    
                          {!!$producto->descripcion!!}
                          
                </div> 

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " id="showpro1" >                   
          <!--<div class="panel panel-body" >
              <h4 class="text-center">Cotizacion</h4>
          </div>-->
              <div class="panel panel-body">
                  <div class="panel panel-body" >
                      <h4 class="text-center">Cotizacion</h4>
                  </div>
                 {!! Form::open(array('route'=>'producto-cot.store','method'=>'POST')) !!}
                 {{Form::token()}}
                 <div class="form-group">
                 <label for="nombre"> Nombre:</label>
                 {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre....','required']) !!}
                 </div>
                 <div class="form-group">
                 <label for="email"> Email:</label>
                 {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email....','required']) !!}
                 </div>
                 <div class="form-group">
                        <label for="telefono"> Telefono (opcional)    :</label>
                         {!! Form::text('telefono',null,['class'=>'form-control ','placeholder'=>'Telefono....','pattern'=>'[0-9]{9}'])!!}
                 </div>

                 <div class="form-group">
                         <label  for="motivo">Consulta    : </label>
                         {!! Form::textarea('consulta',null,['class'=>'form-control','placeholder'=>'Escriba su consulta....','rows'=>'5', 'required']) !!}
                 </div>
                 {!!  Form::hidden('id_producto',$producto->id_producto)!!}
               
                 {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
                 {!! Form::close() !!}
              </div>
            

          </div>
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
