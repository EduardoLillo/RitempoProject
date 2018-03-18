<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Storage;
use DB;
use App\Http\Requests\ProductoFormRequest;
use App\Http\Requests\ProductoEditFormRequest;
use App\Http\Requests\ImagenFormRequest;
use App\Http\Requests\SubCategoriaFormRequest;
use App\Producto;
use App\Imagen;
use App\Subcategoria;


class ImagenController extends Controller
{

public function __construct()
    {
         $this->middleware('auth');
    }

     public function index(Request $request)
    {
        

    }

    public function create($id)
    {
    	//$data['subcategoria'] = Subcategoria::lists('nombre', 'id_categoria');
        return view("producto.subiriamgen",["producto"=>Producto::findOrFail($id)]);
    }

    public function store(ImagenFormRequest $request,$id)
    {
       

     }

/*-----------------------????????????------------------------------------------------------------*/
   public function show()    
    {

      

    }
    
    public function edit()    
    {

   
 }

    public function update()
    {

    }

    /*-----------------------????????????------------------------------------------------------------*/
    
    public function destroy()
    {

          }


}

