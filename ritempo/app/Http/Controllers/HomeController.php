<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Storage;
use DB;
use App\Cotizacion;
use App\Producto;
use App\SubCategoria;
use App\Categoria;

class HomeController extends Controller
{
    

    public function index(Request $request)
    {

  		if ($request)
        {
            $query=trim($request->get('searchText'));
            
            $productos=DB::table('productos')->where('nombre','LIKE','%'.$query.'%')
            ->inRandomOrder()
            ->paginate(12);

            $categoria=Categoria::where('id_categoria','<>','9')->get();
            $categoria->each(function($categoria){

                /*$productos1->nombre;*/
                $categoria->subcategorias;
            });
            


            $productos1=Producto::where('id_subcategoria','<>','86')->orderByRaw('RAND()')->paginate(12);
            $productos1->each(function($productos1){

                /*$productos1->nombre;*/
                $productos1->imagenes;
            });
            return view('home.home',["productos"=>$productos,"searchText"=>$query,"productos1"=>$productos1,"categoria"=>$categoria]);
        }





    }




/*    public function create()
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

    
    
    
    public function destroy($id)
    {

    }


    */



}
