<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use App\Models\Recaudacion;
use Auth;
use DB;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        switch (Auth::user()->role->nombre) {
            case 'Alumno':
                return view('index');
                break;

            default:
                $this->estadisticas();
                return view('admin.index',compact(
                    'resumen','pagantes','total_inscritos','total_pagantes','resumenSede','resumenSedeH','total_inscritos_lima'
                    ,'total_inscritos_hyo','pagantes_sl','pagantes_sh','total_pagantes_l','total_pagantes_h'
                    ));
                break;
        }
    }
    public function estadisticas()
    {
        $resumen = Postulante::Resumen()->orderBy('fecha_registro')->paginate(10);
        $resumenSede = Postulante::ResumenSede('L')->orderBy('fecha_registro')->paginate(10);
        $resumenSedeH = Postulante::ResumenSede('H')->orderBy('fecha_registro')->paginate(10);
        $total_inscritos = Postulante::Resumen()->get()->sum('cantidad');
        $total_inscritos_lima = Postulante::ResumenSede('L')->get()->sum('cantidad');
        $total_inscritos_hyo = Postulante::ResumenSede('H')->get()->sum('cantidad');


        $pagantes = Recaudacion::Resumen()->orderBy('fecha')->paginate(10);
        $pagantes_sl = Recaudacion::ResumenSede('L')->orderBy('fecha')->paginate(10);
        $pagantes_sh = Recaudacion::ResumenSede('H')->orderBy('fecha')->paginate(10);

        $total_pagantes = Recaudacion::Resumen()->get()->sum('cantidad');
        $total_pagantes_l = Recaudacion::ResumenSede('L')->get()->sum('cantidad');
        $total_pagantes_h = Recaudacion::ResumenSede('H')->get()->sum('cantidad');
        return view('admin.index',compact(
                    'resumen','pagantes','total_inscritos','total_pagantes','resumenSede','resumenSedeH','total_inscritos_lima'
                    ,'total_inscritos_hyo','pagantes_sl','pagantes_sh','total_pagantes_l','total_pagantes_h'
                    ));
    }
}
