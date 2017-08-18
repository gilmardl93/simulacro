<?php

namespace App\Http\Controllers\Admin\Estadistica;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Postulante;
use App\Models\Recaudacion;

class EstadisticaController extends Controller
{
    public function index()
    {
        $resumen = Postulante::Resumen()->Activo()->orderBy('fecha_registro')->paginate(10);
        $resumenSede = Postulante::ResumenSede('L')->Activo()->orderBy('fecha_registro')->paginate(10);
        $resumenSedeH = Postulante::ResumenSede('H')->Activo()->orderBy('fecha_registro')->paginate(10);
        $total_inscritos = Postulante::Resumen()->Activo()->get()->sum('cantidad');
        $total_inscritos_lima = Postulante::ResumenSede('L')->Activo()->get()->sum('cantidad');
        $total_inscritos_hyo = Postulante::ResumenSede('H')->Activo()->get()->sum('cantidad');


        $pagantes = Recaudacion::Resumen()->orderBy('fecha')->paginate(10);
        $pagantes_sl = Recaudacion::ResumenSede('L')->orderBy('fecha')->paginate(10);
        $pagantes_sh = Recaudacion::ResumenSede('H')->orderBy('fecha')->paginate(10);

        $total_pagantes = Recaudacion::Resumen()->get()->sum('cantidad');
        $total_pagantes_l = Recaudacion::ResumenSede('L')->get()->sum('cantidad');
        $total_pagantes_h = Recaudacion::ResumenSede('H')->get()->sum('cantidad');
        return view('admin.estadisticas.index',compact(
                    'resumen','pagantes','total_inscritos','total_pagantes','resumenSede','resumenSedeH','total_inscritos_lima'
                    ,'total_inscritos_hyo','pagantes_sl','pagantes_sh','total_pagantes_l','total_pagantes_h'
                    ));
    }
}
