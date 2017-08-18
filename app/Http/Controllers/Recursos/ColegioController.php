<?php

namespace App\Http\Controllers\Recursos;

use App\Http\Controllers\Controller;
use App\Models\Colegio;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class ColegioController extends Controller
{
    public function index()
    {
        return view('admin.colegio.index');
    }
    public function store(Request $request)
    {
        Colegio::create($request->all());
        Alert::success('Colegio Registrado con exito');
        return back();
    }
    public function lista()
    {
        $Lista = Colegio::with(['Distrito','Paises'])->orderBy('nombre')->get();
        $res['data'] = $Lista;
        return $res;
    }
    public function colegio(Request $request)
    {
        $name = $request->varschool ?:'';
        $name = trim(strtoupper($name));

        $colegio = Colegio::select('id','nombre as text','gestion','idubigeo','direccion')
        					->with('Distrito')
        					->where('nombre','like',"%$name%")
        					->get();
        return $colegio;
    }
}
