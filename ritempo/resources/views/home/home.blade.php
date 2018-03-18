
@extends ('template.front')



@section('buscar')
<div class="" id="menubuscar">
                {!! Form::open(array('url'=>'busqueda','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                     <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchText" placeholder="Buscar Producto..." value="{{$searchText}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                      <span class="glyphicon glyphicon-search"></span> Buscar </button>
                                </span>
                            </div>
                     </div>
                     {{Form::close()}}
</div>
              
 @endsection


@section('productos4')

<div class="container-fluid">
    <div class="row-fluid ">
        <div class="col-md-12">
           <h3 class="pro text-center producto-titulo"> Nuestros Productos Más Destacados  </h3>
      </div>     
    </div>
</div>

<div class="container-fluid ">

    <div class="row">
        
         
         @foreach ($productos1 as $pro) 
    
   
   
         <div class="col-xs-12 col-sm-6 col-lg-3 col-md-4 ">

            <div class="product-item">
               
               
              <div class="pi-img-wrapper" >
             
                <img src="{{URL::asset('/productos/'.$pro->imagenes->first()->nombre)}}" class="img-responsive producto-home" id="mas-productos" alt="">
           
                <div  class="prueba" >

                  <a class="nombre prueba ">{{$pro->nombre}} </a>
                   
                    <br>
                   
                                       <!--<a href="{{URL::action('ProductoCotController@show',$pro->id_producto)}}" class="btn">Ver</a>-->
                    <a href="{{ URL::to('show/' . $pro->id_producto) }}  " class="btn prueba">  <span class="glyphicon glyphicon-search"></span>   Ver / Cotizar</a>
                   
                  
                </div>

              </div>
            
           
            </div>
           
        </div>
        
     
        @endforeach  
           
       
    </div>
      
    <div class="row text-center">
        <div class="col-lg-12">
        {{$productos1->render()}}
        </div>
        </div>
     
</div>

<br>
@endsection


@section('sliderhomenew')


<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
    <li>
    <img src="{{URL::asset('/assets/sliderhome/data1/images/astorresto.png')}}" 
    alt=""
    title="" 
    id="wows1_0"/>
    </li>
    <li>
    <img src="{{URL::asset('/assets/sliderhome/data1/images/imagescctv_in.jpg')}}" 
    alt="" 
    title="" 
    id="wows1_1"/>
    </li>
    <li><a href="">
    <img src="{{URL::asset('/assets/sliderhome/data1/images/panaderia.png')}}" 
    alt="jquery slideshow" 
    title="" 
    id="wows1_2"/></a>
    </li>
    <li><img src="{{URL::asset('/assets/sliderhome/data1/images/heladeras.png')}}" 
    alt="" 
    title="" 
    id="wows1_3"/></li>
  </ul></div>
  <div class="ws_bullets"><div>
    <a href="#" title=""><span>1</span></a>
    <a href="#" title=""><span>2</span></a>
    <a href="#" title=""><span>3</span></a>
    <a href="#" title=""><span>4</span></a>
  </div></div>
</div>    
<!--<div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">http://wowslider.net/</a> by WOWSlider.com v8.7</div>-->
<div class="ws_shadow"></div>
<!-- End WOWSlider.com BODY section -->
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