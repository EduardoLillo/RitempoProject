<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subcategoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SubcategoriaFormRequest;
use DB;
use App\Categoria;
use App\Http\Requests\CategoriaFormRequest;
use App\Http\Requests\SubcategoriaEditFormRequest;
use App\Producto;



class SubcategoriaController extends Controller
{
 
    public function index(Request $request,$id)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $productosbusqueda=DB::table('productos')->where('nombre','LIKE','%'.$query.'%');
        
        
           $subcategoria =DB::table('subcategorias')->where('id_subcategoria',$id)->first();
           $productos= Producto::where('id_subcategoria',$id)->paginate(12);
           
           $productos->each(function($productos){
           $productos->imagenes;

           });

           $categoria=Categoria::where('id_categoria','<>','9')->get();
            $categoria->each(function($categoria){

                /*$productos1->nombre;*/
                $categoria->subcategorias;
            });
            

           return view('subcategoria.subcategoria',["productos"=>$productos,"subcategoria"=>$subcategoria,"productosbusqueda"=>$productosbusqueda,"searchText"=>$query,"categoria"=>$categoria]);
        } 
        
    }
    
    public function create()
    {
        
      
    }
    
    public function store (SubcategoriaFormRequest $request)
    {
        
    }
    public function show($id)
    {
        

        //return view("subcategoria.show",["subcategoria"=>subcategoria::findOrFail($id)]);
    }
    public function edit($id)    
    {
      
    }
    public function update(SubcategoriaEditFormRequest $request,$id)
    {

        
    }
    public function destroy($id)
    {
        

        
    }
}
