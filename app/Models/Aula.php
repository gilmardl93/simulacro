<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aula';
    protected $fillable = ['orden','sector', 'codigo','capacidad','disponible','asignado','activo'];
    public $timestamps = false;
    /**
     * Atributos sector
     */
    public function setSectorAttribute($value)
    {
        $this->attributes['sector'] = strtoupper($value);
    }
    /**
     * Atributos codigo
     */
    public function setCodigoAttribute($value)
    {
        $this->attributes['codigo'] = strtoupper($value);
    }
    /**
    * Devuelve los valores Activos
    * @param  [type]  [description]
    * @return [type]            [description]
    */
    public function scopeActivas($cadenaSQL,$estado = true){
    	return $cadenaSQL->where('activo',$estado);
    }
}
