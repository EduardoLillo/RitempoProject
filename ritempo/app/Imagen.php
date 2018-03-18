<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
	protected $table='imagenes';
	protected $primaryKey='id_imagen'; 
    protected $fillable=['nombre','ruta'];
    public 	  $timestamps=false;
   

	public function productos()
	{
		return $this->belongsToMany('App\Producto','imagen_producto','imagen_id','producto_id')->withPivot('producto_id');
	}
}


/*
public function tasks(){
        return $this->belongsToMany('\App\Task','menu_task_user')
            ->withPivot('menu_id','status');
    }
 
    public function menu(){
        return $this->belongsToMany('\App\Menu','menu_task_user')
            ->withPivot('task_id','status'); 
    }
    */