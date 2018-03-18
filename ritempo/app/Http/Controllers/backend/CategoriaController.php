<?php
namespace App\Http\Controllers\backend;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use App\Http\Requests\CategoriaEditFormRequest;
use DB;


class CategoriaController extends Controller
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
            $categorias=DB::table('categorias')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id_categoria','desc')
            ->paginate(5);
            return view('backend.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("backend.categoria.create");
    }

    public function store (CategoriaFormRequest $request)
    {
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');

        $categoria->save();
        return Redirect::to('admin/categoria');

    }
    
    public function show($id)
    {
       $categoria=Categoria::find($id);
      
       return view("backend.categoria.show",['categoria'=>$categoria]);
    }

    public function edit($id)
    {
        return view("backend.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaEditFormRequest $request,$id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('admin/categoria');
    }
    
    public function destroy($id)
    {
        try {

          $categoria=Categoria::findOrFail($id);
          /*$categoria->condicion='0';*/
          $categoria->delete();
        return Redirect::to('admin/categoria');
            
        } catch (\Illuminate\Database\QueryException $e ) {
            
            //return 'No puede eliminar la categoria,por que tiene subcategorias asociadas';
            return Redirect::to('admin/categoria')
        ->with('msj','noooooooooooooo');
            
        }

    }


}
