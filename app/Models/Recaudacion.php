<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Recaudacion extends Model
{
    protected $table = 'recaudacion';
    protected $fillable = ['recibo', 'servicio', 'descripcion','monto','fecha','codigo','nombrecliente','idpostulante','banco','referencia'];

    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeResumen($cadenaSQL){
        return $cadenaSQL->select('fecha',DB::raw('count(*) as cantidad'))
                         ->orderBy('fecha','desc')
                         ->groupBy('fecha');
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeResumenSede($cadenaSQL,$sede){
        $sede = Catalogo::select('id')->where('codigo',$sede)->first();
        return $cadenaSQL->select('fecha',DB::raw('count(*) as cantidad'))
                         ->join('postulante as p','p.id','=','recaudacion.idpostulante')
                         ->where('p.idsede',$sede->id)
                         ->orderBy('fecha','desc')
                         ->groupBy('fecha');
    }


    /**
     * Establecemos el la relacion con catalogo
     * @return [type] [description]
     */
    public function Postulantes()
    {
        return $this->hasOne(Postulante::class,'id','idpostulante');
    }
}
