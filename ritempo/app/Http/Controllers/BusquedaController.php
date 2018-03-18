<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Storage;
use DB;
use App\Cotizacion;
use App\Producto;
use App\Imagen;
use App\SubCategoria;
use App\Categoria;

class BusquedaController extends Controller
{
    public function index(Request $request)
    {

  		if ($request)
        {
            $query=trim($request->get('searchText'));
            /*$productos=DB::table('productos')->where('nombre','LIKE','%'.$query.'%')
            ->inRandomOrder()
            ->paginate(12);*/



            /* $productos = DB::table('productos')
            ->join('imagen_producto', 'productos.id_producto', '=', 'imagen_producto.producto_id')
            ->join('imagenes', 'imagenes.id_imagen', '=', 'imagen_producto.imagen_id')
            ->select('productos.nombre','productos.id_producto','imagenes.nombre as img_nombre')        
            ->where('productos.nombre','LIKE','%'.$query.'%')
            ->paginate(12);*/

            $productos1=Producto::where('nombre','LIKE','%'.$query.'%')->paginate(12);
            $productos1->each(function($productos1){

                /*$productos1->nombre;*/
                $productos1->imagenes;
            });

            $categoria=Categoria::where('id_categoria','<>','9')->get();
            $categoria->each(function($categoria){

                /*$productos1->nombre;*/
                $categoria->subcategorias;
            });
            


            return view('busqueda.busqueda',["productos"=>$productos1,"searchText"=>$query,"categoria"=>$categoria]);
        }


/*
        $productos=Producto::inRandomOrder()->paginate(12);


        return view('home.home',['productos'=>$productos]); */
    }

    public function create()
    {

    }

    
    public function store (Request $request)
    {
        
     }


    public function show($id)    
    {
     
    }

    public function edit($id)    
    {
    	
    }

    public function update(ProductoEditFormRequest $request ,$id)
    {
        
    }

    /*-----------------------????????????------------------------------------------------------------*/
    
    public function destroy($id)
    {

    }


}
