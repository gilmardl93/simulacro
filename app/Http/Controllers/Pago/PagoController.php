<?php

namespace App\Http\Controllers\Pago;

use App\Http\Controllers\Controller;
use App\Models\Postulante;
use App\Models\Catalogo;
use Illuminate\Http\Request;
use PDF;
class PagoController extends Controller
{
    public function index($id = null)
    {
    	return view('pagos.index',compact('id'));
    }
    public function pdf($id = null)
    {
        if (isset($id)) {
           $postulante = Postulante::find($id);
        } else {
           $postulante = Postulante::Usuario()->first();
        }

        if(isset($postulante)){

        $servicio = Catalogo::table('servicio')->first();
        $this->FormatoPago($servicio, $postulante, 'SCOTIABANK');
        $this->FormatoPago($servicio, $postulante, 'BCP');

        PDF::Output(public_path('storage/tmp/').'FormatoPago'.$postulante->dni.'.pdf','FI');
        }
    }

    public function FormatoPago($servicio, $postulante, $banco)
    {
        PDF::SetTitle('RECIBO DE PAGO');
        PDF::AddPage('L','A5');
        #RECTANGULO
        PDF::Rect(15,15, 180,100 );
        
        switch($banco)
        {
            case "BCP":
                PDF::Image(asset('assets/pages/img/LogoBCP.png'),18,20,40);
            break;
            default:
                PDF::Image(asset('assets/pages/img/scotiabank_logo.jpg'),18,20,40);
        }

        #TITULO
        PDF::SetXY(20,15);
        PDF::SetFont('helvetica','',22);
        PDF::Cell(170,15,"FORMATO DE PAGO",0,0,'C');
        #CCOLOR DEL TEXTO
        PDF::SetTextColor(0);
        #INSTITUCION
        PDF::SetXY(18,40);
        PDF::SetFont('helvetica','B',11);
        PDF::Cell(60,5,'Cuenta :',1,0,'R');
        PDF::SetXY(78,40);
        PDF::SetFont('helvetica','B',10);
        PDF::Cell(110,5,'ADMISION-UNI',1,0,'L');
        #CONCEPTO
        PDF::SetXY(18,45);
        PDF::SetFont('helvetica','B',11);
        PDF::Cell(60,5,'Concepto :',1,0,'R');
        PDF::SetXY(78,45);
        PDF::SetFont('helvetica','',11);
        PDF::Cell(110,5, $servicio->codigo.'-'.$servicio->descripcion,1,0,'L');
        #CODIGO CNE
        PDF::SetXY(18,50);
        PDF::SetFont('helvetica','B',11);
        PDF::Cell(60,5,'DNI :',1,0,'R');
        PDF::SetXY(78,50);
        PDF::SetFont('helvetica','',11);
        PDF::Cell(110,5,$postulante->dni,1,0,'L');
        #ETIQUETA NOMBRE DEL ALUMNO
        PDF::SetXY(18,55);
        PDF::SetFont('helvetica','B',11);
        PDF::Cell(60,5,'Nombre del Participante :',1,0,'R');
        PDF::SetXY(78,55);
        PDF::SetFont('helvetica','',11);
        PDF::Cell(110,5,$postulante->nombre_completo,1,0,'L');
        #ETIQUETA IMPORTE
        PDF::SetXY(18,60);
        PDF::SetFont('helvetica','B',11);
        PDF::Cell(60,5,"Importe :",1,0,'R');
        PDF::SetXY(78,60);
        PDF::SetFont('helvetica','',11);
        PDF::Cell(110,5,$servicio->valor ,1,0,'L');
        #TITULO INSTRUCCIONES
        PDF::SetXY(18,65);
        PDF::SetFont('helvetica','',15);
        PDF::SetTextColor(255,0,0);
        PDF::Cell(123,5,"Instrucciones para el Participante",0,0,'L');
        #INSTRUCCIONES
        PDF::SetXY(18,73);
        PDF::SetFont('helvetica','',11);
        PDF::SetTextColor(0);
        PDF::Cell(123,0,"1. Verificar que los datos registrados en la parte superior sean los correctos.",0,0,'L');
        PDF::SetXY(18,78);
        PDF::Cell(123,0,"2. Verificar que el nombre sea del participante no del apoderado o de quien pague.",0,0,'L');
    }
}
