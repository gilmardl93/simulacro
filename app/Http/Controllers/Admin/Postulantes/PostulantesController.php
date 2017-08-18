<?php

namespace App\Http\Controllers\Admin\Postulantes;

use App\Http\Controllers\Controller;
use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulantesController extends Controller
{
    public function index()
    {
    	return view('admin.postulantes.index');
    }
    public function lista()
    {
	    $Lista = Postulante::Activos()->with(['Sexo','Sedes','Grado','Ubigeos','Especialidades','Colegios','Aulas'])->get();
	    $res['data'] = $Lista;
	    return $res;
    }
    public function ficha($id)
    {
        return view('admin.postulantes.ficha',compact('id'));
    }
    public function pago($id)
    {
        return view('admin.postulantes.pago',compact('id'));
    }
}
