<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subcategoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SubcategoriaFormRequest;
use DB;
use App\Categoria;
use App\Http\Requests\CategoriaFormRequest;
use App\Http\Requests\SubcategoriaEditFormRequest;
//use App\Http\Controller\CategoriaController;




class SubcategoriaController extends Controller
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
            $subcategorias=DB::table('subcategorias')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id_subcategoria','desc')
            ->paginate(5);
                        
            return view('backend.subcategoria.index',["subcategorias"=>$subcategorias,"searchText"=>$query]);
        }
    }

    public function create()
    {
        
        $data['categoria'] = Categoria::pluck('nombre', 'id_categoria');

   // $categorias =Categoria::all('id_categoria','nombre');
        return view("backend.subcategoria.create",$data);
        //return view('subcategoria.create',compact('categorias'));
    }
    
    public function store (SubcategoriaFormRequest $request)
    {
        $subcategoria=new Subcategoria;
         //$subcategoria->id_categoria=Input::get('do');
        //$subcategoria->id_categoria=$id;
        $subcategoria->nombre=$request->get('nombre');
        $subcategoria->descripcion=$request->get('descripcion');
        $subcategoria->id_categoria=$request->get('categoria');
        
        $subcategoria->save();
        return Redirect::to('admin/subcategoria');

    }
    public function show($id)
    {
        $subcategoria=Subcategoria::find($id);
      
       return view("backend.subcategoria.show",['subcategoria'=>$subcategoria]);

        //return view("subcategoria.show",["subcategoria"=>subcategoria::findOrFail($id)]);
    }

    public function edit($id)    
    {
        $data['categoria'] = Categoria::pluck('nombre', 'id_categoria');
        return view("backend.subcategoria.edit",["subcategoria"=>subcategoria::findOrFail($id)],$data);
    }

    public function update(SubcategoriaEditFormRequest $request,$id)
    {

        $subcategoria=subcategoria::findOrFail($id);
        $subcategoria->nombre=$request->get('nombre');
        $subcategoria->descripcion=$request->get('descripcion');
        $subcategoria->id_categoria=$request->get('categoria');

       // $subcategoria->categoria=$request->get('categoria');
         $subcategoria->update();
         return Redirect::to('admin/subcategoria');
    }
    public function destroy($id)
    {
        try {

          $subcategoria=subcategoria::findOrFail($id);
        /*$categoria->condicion='0';*/
          $subcategoria->delete() ;

        return Redirect::to('admin/subcategoria')->with('message','<i class="fa fa-check-square-o fa-lg"></i> Products has been created!'); 

        } catch (\Illuminate\Database\QueryException $e) {

            return Redirect::to('admin/subcategoria')->with('message','<i class="fa fa-check-square-o fa-lg"></i> Products has been created!');
        }

        
    }
}
