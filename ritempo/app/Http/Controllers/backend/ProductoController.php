<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Storage;
use DB;
use App\Http\Requests\ProductoFormRequest;
use App\Http\Requests\ProductoEditFormRequest;
use App\Http\Requests\SubCategoriaFormRequest;

use App\Producto;
use App\Subcategoria;
use App\Imagen;

//use App\Http\Controller\SubcategoriaController;

class ProductoController extends Controller
{
     public function __construct()
    {
         $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $productos=DB::table('productos')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id_producto','desc')
            ->paginate(5);
            return view('backend.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	 $data['subcategoria'] = Subcategoria::pluck('nombre', 'id_subcategoria');
       return view("backend.producto.create",$data);
    }

    
    public function store (ProductoFormRequest $request)
    {
 
        $file = Input::file('imagen');
        $producto = new Producto($request->all());       
        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->marca=$request->get('marca');
        $producto->id_subcategoria=$request->get('subcategoria');
        $producto->save();

    
        if ($request->file('imagen')){     

                 foreach ($file as $value) {
              
                  $nombre_img = $value->getClientOriginalName();                 
                  $ruta = public_path().'\productos';
                  $destinacion = 'productos';
                  $filename = 'PRO_' . time() . '.' . $nombre_img;
                  //$filename = 'PRO_'. str_random(4) . '_' .$nombre_img;
                  $upload = $value->move($destinacion, $filename);
                  $imagen=new Imagen();
                  $imagen->nombre=$filename;
                  $imagen->ruta=$ruta;
                  
                  $imagen->save();
                  $producto->imagenes()->attach($imagen);
             }

        }
         return Redirect::to('admin/producto');
     }


    public function show($id)    
    {

      $producto=Producto::find($id);
      //$productos=Producto::find($id)->paginate(3);
     // $producto=DB::table('productos')->where('id_producto',$id);
       return view("backend.producto.show",['producto'=>$producto]);
       //return view("producto.show",$producto);
        //return view("producto.show",$producto);

    }
    public function edit($id)    
    {
    	$data['subcategoria'] = Subcategoria::pluck('nombre','id_subcategoria');
        return view("backend.producto.edit",["producto"=>Producto::findOrFail($id)],$data);
    }

    public function update(ProductoEditFormRequest $request ,$id)
    {
        
        $producto=Producto::findOrFail($id);
        //$file = Input::file('imagen');
        //$producto = new Producto();
        //$producto = new Producto($request->all());        
        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->marca=$request->get('marca');
        $producto->id_subcategoria=$request->get('subcategoria');
        $producto->update();
        $file = Input::file('imagen');
        

        //var_dump($file);
              if ($request->hasfile('imagen')){            
                
                   foreach ($file as $value) {
              
                  $nombre_img = $value->getClientOriginalName();                 
                  $ruta = public_path().'\productos';
                  $destinacion = 'productos';
                  $filename = 'PRO_' . time() . '.' . $nombre_img;
                  //$filename = 'PRO_'. str_random(4) . '_' .$nombre_img;
                  $upload = $value->move($destinacion, $filename);
                  $imagen=new Imagen();
                  $imagen->nombre=$filename;
                  $imagen->ruta=$ruta;
                  //$producto->imagenes()->detach();
                  $imagen->save();
                  $producto->imagenes()->attach($imagen);
               }
           }
           /*else {
              $file = null;
                }*/

            return Redirect::to('admin/producto');
    }

    /*-----------------------????????????------------------------------------------------------------*/
    
    public function destroy($id)
    {
        try {

          $producto=Producto::findOrFail($id);
         // $producto->imagenes()->detach();

        /*$categoria->condicion='0';*/
          //$imagenes=DB::table('imagenes')->where('nombre','LIKE','%'.$query.'%')

          $producto->imagenes()->detach();
          $producto->delete();

        return Redirect::to('admin/producto');
            
        } catch (\Illuminate\Database\QueryException $e ) {
            return Redirect::to('admin/producto')
        ->with('message','<i class="fa fa-check-square-o fa-lg"></i> Products has been created!');            
        }
    }

}
