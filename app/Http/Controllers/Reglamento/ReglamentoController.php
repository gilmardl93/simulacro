<?php

namespace App\Http\Controllers\Reglamento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evaluacion;

class ReglamentoController extends Controller
{
    public function index()
    {
        $eva = Evaluacion::first();
        if(str_contains($eva->descripcion,['IEN']))
    	return view('reglamento.index_ien');
        else return view('reglamento.index');
    }
}
