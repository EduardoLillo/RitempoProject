<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
protected $table='productos';

    protected $primaryKey='id_producto'; 
    

    public $timestamps=false;

    protected $fillable=['nombre','descripcion','marca','id_subcategoria'];

    
    public function imagenes()
    {

    	return $this->belongsToMany('App\Imagen','imagen_producto','producto_id','imagen_id')->withPivot('imagen_id');
    }
    



   public function cotizaciones()
    {
        return $this->hasMany('App\Cotizacion','id_cotizacion');
    }
    
    
    public function subcategoria()
    {
        return $this->belongsTo('App\Subcategoria','id_subcategoria');
    }



    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
