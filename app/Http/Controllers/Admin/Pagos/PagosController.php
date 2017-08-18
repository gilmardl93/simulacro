<?php

namespace App\Http\Controllers\Admin\Pagos;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagoUnitarioRequest;
use App\Http\Requests\PagosRequest;
use App\Models\Catalogo;
use App\Models\Evaluacion;
use App\Models\Postulante;
use App\Models\Recaudacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;
use Styde\Html\Facades\Alert;

class PagosController extends Controller
{
	private $cuentaUNI;


	function __construct()
	{
		$this->cuentaUNI = '978853000001';
	}
    public function index()
    {
    	return view('admin.pagos.index');
    }
	public function listado()
	{
		return view('admin.pagos.listado');
	}
    public function lista()
    {
	    $Lista = Recaudacion::with('Postulantes')->get();
	    $res['data'] = $Lista;
	    return $res;
    }
    public function pagocreate(PagoUnitarioRequest $request)
    {
        $servicio = Catalogo::table('SERVICIO')->first();
        $pago = Recaudacion::where('codigo',$request->input('codigo'))->where('servicio',$servicio->nombre)->first();
        $pos = Postulante::Activos()->where('dni',$request->input('codigo'))->first();
        $ser = $servicio->nombre;
        $cod = $request->input('codigo');
        $banco = $request->input('banco');
        $ref = $request->input('referencia');
        $des = $servicio->descripcion;
        $mon = $servicio->valor;
        $date = Carbon::now();

        $pago = Recaudacion::create([
                            'servicio'=>$ser,
                            'recibo'=>$ser.$cod,
                            'descripcion'=>$des,
                            'monto'=>$mon,
                            'fecha'=>$date,
                            'codigo'=>$cod,
                            'nombrecliente'=>$pos->nombre_cliente,
                            'banco'=>$banco,
                            'referencia'=>$ref,
                            'idpostulante'=>$pos->id
                            ]);
        if($pago){
            $data[0]['idpostulante']=$pos->id;
            Postulante::AsignarCodigo($data);
            Postulante::AsignarAula($data);
            return back();
        }


    }
    public function store(PagosRequest $request)
    {
    	$file = $request->file('file');
    	$nombre = $file->getClientOriginalName();
    	$archivo = '';
    	if (str_contains($nombre,'bws')) {
    		$request->file('file')->storeAs('resumen',$nombre);
    		$archivo = storage_path('app/resumen/').$nombre;
            $archivo = file($archivo);
    	}else{
    		$request->file('file')->storeAs('pagos',$nombre);
    		$archivo = storage_path('app/pagos/').$nombre;
            $archivo = file($archivo);
    	}
    	$i = 0;
    	$pagos = Recaudacion::select('recibo')->get();
    	$date = Carbon::now();
    	$data = [];
    	foreach ($archivo as $key => $value) {
    		if (substr($value, 0 ,1) == 'D' && substr($value, 15 ,3)=='520') {
    			$data[$i]['recibo'] = substr($value, 15 ,11);
    			$data[$i]['servicio'] = substr($value, 15 ,3);
    			$data[$i]['descripcion'] = substr($value, 157 ,22);
    			$data[$i]['monto'] = (float)substr($value, 77 ,2);
    			$data[$i]['fecha'] = substr($value, 134 ,4).'-'.substr($value, 138 ,2).'-'.substr($value, 140 ,2);
    			$data[$i]['codigo'] = substr($value, 18 ,8);
                $data[$i]['nombrecliente'] = substr($value, 48 ,20);
    			$data[$i]['banco'] = 'Scotiabank';
    			$data[$i]['created_at'] = $date;
    			$data[$i]['updated_at'] = $date;
    			$i++;
    		}
    	}

		$recibos = $pagos->implode('recibo',',');
		$data = array_where($data, function ($value, $key) use($recibos) {
			if (!str_contains($recibos,$value['recibo']))
		    return $value;
		});

		$postulantes = Postulante::Pagantes()->get()->toArray();


    	if (count($data)==0) {
    		Alert::success('No hay Pagos Nuevos');
    	}else{

    		foreach ($data as $key => $value) {
    				$id = search_in_array($postulantes,'dni',$value['codigo'],'id');
                if ($id != 0) {
   			      $data[$key]['idpostulante'] = $id;
                }else{
                    Alert::warning('Este codigo no existe '.$value['codigo']. ' posiscion :'.($key+1));
                    return back();
                }
            }

            Alert::success(count($data).' Pagos Nuevos se han registrado');

            if (Recaudacion::insert($data)) {
                Postulante::AsignarCodigo($data);
    			Postulante::AsignarAula($data);
    		}
    	}
    	return back();
    }
    /**
     * Crea el archivo que se envia al banco
     * @return [type] [description]
     */
    public function create()
    {
    	$postulantes = Postulante::Pagantes()->Alfabetico()->get();
    	$param = $this->Parametros($postulantes);

    	$name = 'UNIADMIS.txt';
    	Storage::disk('carteras')->put($name,$param['header']);
    	foreach ($postulantes as $key => $postulante) {
    		$detalle = $this->ParametrosDetalle($postulante);
    		Storage::disk('carteras')->append($name, $detalle);
    	}
    	Storage::disk('carteras')->append($name, $param['footer']);

    	Alert::success('Cartera Creada con exito');
    	return back();
    }
    public function Parametros($postulantes)
    {
    	$servicio = Catalogo::table('SERVICIO')->first();
    	$evaluacion = Evaluacion::Activo()->first();
    	$conceptoServicio = $servicio->nombre;
    	$cabecera = collect([
    		$tipoCabecera = 'H',
	    	$Cuenta = pad($this->cuentaUNI,14,' '),
			$Concepto = $conceptoServicio,
			$TotalAlumnos = pad($postulantes->count(),7,'0','L'),
			$TotalSoles = pad(pad($servicio->valor*$postulantes->count(),15,'0','L'),17,'0'),
			$TotalDolares = pad(0,17,'0','L'),
			$RucEmpresa = '02016900400',
			$FechaEnvio = Carbon::now()->format('Ymd'),
			$FechaVigencia = str_replace('-', '', $evaluacion->fecha_fin),
			$FillerInicio = pad('0',3,'0','L'),
			$Diasmora = pad('0',3,'0','L'),
			$Tipomora = pad('0',2,'0','L'),
			$Moraflat = pad('0',9,'0','L'),
			$Porcentajemora = pad('0',8,'0','L'),
			$Montofijo = pad('0',9,'0','L'),
			$Tipodescuento = pad('0',2,'0','L'),
			$Montoadescontar = pad('0',9,'0','L'),
			$Porcentajedescuento = pad('0',8,'0','L'),
			$Diasdescuento = pad('0',3,'0','L'),
			$FillerFin = pad(' ',111,' ','L'),
			$Finderegistro = '*'
    	]);
		$pie = collect([
			$TipoPie = 'C',
			$Cuenta = pad($this->cuentaUNI,14,' '),
			$Concepto = $conceptoServicio,
			$CodigoConcepto = '01',
			$DescripcionConcepto = pad($evaluacion->nombre,30,' '),
			$AfectoPagoParcial = '0',
			$Cuenta = pad($this->cuentaUNI,14,' '),
			$FillerFinPie = pad(' ',188,' ','L'),
			$FinderegistroPie = '*'
	    ]);
    	return [
    		'header' => $cabecera->implode(''),
    		'footer' => $pie->implode('')
    	];
    }
    public function ParametrosDetalle($postulante)
    {
    	$servicio = Catalogo::table('SERVICIO')->first();
    	$evaluacion = Evaluacion::Activo()->first();
    	$detalle = collect([
	    	$TipoDetalle = 'D',
	    	$Cuenta = pad($this->cuentaUNI,14,' '),
	    	$Concepto = $servicio->nombre,
	    	$Codigo = pad($postulante->dni,15,' '),
			$NroRecibo = 'SIM'.pad($postulante->dni,12,'0','L'),
			$CodigoAgrupacion = pad('',11,' '),
			$Situacion = '0',
			$MonedaCobro = '0000',
			$Cliente = pad(substr($postulante->nombre_cliente,0,20),20,' '),
			$DescripcionConcepto = pad($evaluacion->nombre,30,' '),
			$CodigoConcepto = '01',
			$ImporteConcepto = pad(pad($servicio->valor,4,'0'),9,'0','L'),
			$CodigoConcepto2 = pad('',2,' '),
			$ImporteConcepto2 = pad('0',9,'0'),
			$CodigoConcepto3 = pad('',2,' '),
			$ImporteConcepto3 = pad('0',9,'0'),
			$CodigoConcepto4 = pad('',2,' '),
			$ImporteConcepto4 = pad('0',9,'0'),
			$CodigoConcepto5 = pad('',2,' '),
			$ImporteConcepto5 = pad('0',9,'0'),
			$CodigoConcepto6 = pad('',2,' '),
			$ImporteConcepto6 = pad('0',9,'0'),
			$ImporteConcepto = pad(pad($servicio->valor,4,'0'),15,'0','L'),
			$ImporteConcepto = pad(pad($servicio->valor,4,'0'),15,'0','L'),
			$PorcentajeMinimo = pad('0',8,'0','L'),
			$OrdenCronologico = '1',
			$FechaEnvio = Carbon::now()->format('Ymd'),
			$FechaVigencia = str_replace('-', '', $evaluacion->fecha_fin),
			$DiasProrroga = '000',
			$FillerFinDetalle = pad(' ',15,' ','L'),
			$FinderegistroDetalle = '*'
		]);
		return $detalle->implode('');
    }
    public function descarga()
    {
    	$headers = [];
    	return response()->download(
    			storage_path('app/carteras/UNIADMIS.txt'),
    			null,
    			$headers
    		);
    }
}
