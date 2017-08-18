<?php

namespace App\Http\Controllers\Recursos;

use App\Http\Controllers\Controller;
use App\Models\Ubigeo;
use Illuminate\Http\Request;

class UbigeoController extends Controller
{
    public function index()
    {

    	$ubigeo = Ubigeo::where('descripcion','like','%LIMA%')->get();
    	dd($ubigeo->toArray());

    }
    /**
     * Devuelve el Ubigeo
     * @return [type] [description]
     */
    public function ubigeo(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));

        $ubigeo = Ubigeo::Obtener($name)->get();
        return $ubigeo;
    }
}
