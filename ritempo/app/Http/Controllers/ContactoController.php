<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Session;
use Redirect;
use DB;
use App\SubCategoria;
use App\Categoria;

class ContactoController extends Controller
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
            

            return view('contacto',["productos"=>$productos,"searchText"=>$query,"categoria"=>$categoria]);
        }

   }

    public function store(Request $request)
    {

     Mail::send('emails.contacto',$request->all(), function($msj){
            $msj->subject('Correo de Contacto');
            $msj->to('contacto@ritempo.cl');            
        });
        Session::flash('message','Mensaje enviado correctamente');
        return Redirect::to('/contacto');
    }


/*-----------------------????????????------------------------------------------------------------*/


 }
