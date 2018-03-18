
@extends('template.front')


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
 
@section('servicio')
@include('alerts.success')
<div class="container ">
    <div class="row">
        <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 ">
            
                   <div class="panel panel-body">
                    <div class="panel" >
                        <h3 class="text-center">Servicio Técnico</h3>
                    </div> 
                     {!! Form::open(array('route'=>'servicio.store','method'=>'POST')) !!}
                     <div class="form-group">
                    <label for="nombre"> Nombre:</label>
                     {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre....','required']) !!}
                     </div>
                     <div class="form-group">
                    <label for="email"> Email:</label>
                     {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email....','required']) !!}
                     </div>
                     <div class="form-group">
                            <label for="telefono"> Telefono    :</label>
                             {!! Form::tel('telefono',null,['class'=>'form-control ','pattern'=>'[0-9]{9}','placeholder'=>'Telefono....','required'])!!}
                    </div>
                    <div class="form-group">
                            <label for="servicio"> Tipo de Servicio   :</label>
                            {!! Form::select('servicio',['Software'=>'Software', 'Hardware'=>'Hardware','Gastronomia'=>'Gastronomia','Otros'=>'Otros'],null,['placeholder'=>'Seleccione el tipo de sevicio','required']) !!}    
                    </div>
                     <div class="form-group">
                             <label  for="motivo">Motivo    : </label>
                             {!! Form::textarea('motivo',null,['class'=>'form-control','placeholder'=>'Motivo del servicio....','rows'=>'5', 'required']) !!}
                    </div>

                  
                     {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
                     {!! Form::close() !!}
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