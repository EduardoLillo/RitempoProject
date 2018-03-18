
@extends ('template.front')
@section('buscar')
<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                {!! Form::open(array('url'=>'busqueda','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                     <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Buscar Producto</button>
                                </span>
                            </div>
                     </div>
                     {{Form::close()}}
                 </div>
 @endsection