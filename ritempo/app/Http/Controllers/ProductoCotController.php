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


class ProductoCotController extends Controller
{
    


    public function index(Request $request)
    {

         
       
    }

    public function create()
    {

    }

    
    public function store (Request $request)
    {
        $cotizacion=new Cotizacion;
        //$subcategoria->id_categoria=Input::get('do');
        //$subcategoria->id_categoria=$id;
        $cotizacion->id_producto=$request->get('id_producto');
        $cotizacion->nombre_cliente=$request->get('name');
        $cotizacion->email=$request->get('email');
        $cotizacion->telefono=$request->get('telefono');
        $cotizacion->consulta=$request->get('consulta'); 
        $cotizacion->estado='no cotizado';     
        $cotizacion->save();
        
        return Redirect::to('/');
       

     }


    public function show(request $request,$id)    
    {
        /* 
        {   
            $imagenes = DB::table('imagen_producto')->where('producto_id',$id);
            foreach ($imagenes as $key => $value) {

                # code...
            }
        */
            if ($request)
            {
               /* $producto=Producto::find($id);
                $producto->each(function($producto){

                $producto->nombre;
                $producto->descripcion;
                $producto->imagenes;
                });*/

        
            $query=trim($request->get('searchText'));
            $productosbusqueda=DB::table('productos')->where('nombre','LIKE','%'.$query.'%')
            ->inRandomOrder()
           ->paginate(12);
           
           $categoria=Categoria::where('id_categoria','<>','9')->get();
            $categoria->each(function($categoria){

                /*$productos1->nombre;*/
                $categoria->subcategorias;
            });


        
             $producto=Producto::find($id);
           
            return view('Producto-cotizacion.show',["producto"=>$producto,"productos"=>$productosbusqueda,"searchText"=>$query,"categoria"=>$categoria]);
        }
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
