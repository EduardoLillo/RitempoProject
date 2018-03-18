<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Cotizacion;

class CotizacionController extends Controller
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
            $cotizaciones=DB::table('cotizaciones')->where('nombre_cliente','LIKE','%'.$query.'%')
            ->orderBy('id_cotizacion','desc')
            ->paginate(5);
            return view('backend.cotizacion.index',["cotizaciones"=>$cotizaciones,"searchText"=>$query]);
        }
    }

    public function create()
    {
        
    }

    public function store (CategoriaFormRequest $request)
    {
        
    }
    
    public function show($id)
    {
       $cotizacion=Cotizacion::find($id);
 
       return view("backend.cotizacion.show",['cotizacion'=>$cotizacion]);
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request ,$id)
    {
        $cotizacion=Cotizacion::findOrFail($id);
    

       /* $cotizacion->id_producto=$request->get('id_producto');
        $cotizacion->nombre_cliente=$request->get('name');
        $cotizacion->email=$request->get('email');
        $cotizacion->telefono=$request->get('telefono');
        $cotizacion->consulta=$request->get('consulta'); */
        $cotizacion->estado=$request->get('cotizacion');     
        $cotizacion->update();
        return Redirect::to('admin/cotizacion');
    }
    
    public function destroy($id)
    {
        try {

          $cotizacion=Cotizacion::findOrFail($id);
          /*$categoria->condicion='0';*/
          $cotizacion->delete();
        return Redirect::to('admin/cotizacion');
            
        } catch (\Illuminate\Database\QueryException $e ) {
            
            //return 'No puede eliminar la categoria,por que tiene subcategorias asociadas';
            return Redirect::to('admin/categoria')
        ->with('msj','noooooooooooooo');
            
        }

    }


}
