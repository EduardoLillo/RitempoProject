<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    
    protected $table='cotizaciones';

    protected $primaryKey='id_cotizacion'; 
    

    public $timestamps=false;

    protected $fillable=['id_producto','nombre_cliente','email','telefono','consulta','estado'];

    public function producto()
    {
        return $this->belongsTo('App\Producto','id_producto');
    }
    
}
