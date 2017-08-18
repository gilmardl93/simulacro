<?php

namespace App\Http\Controllers\Admin\Fotos;

use App\Http\Controllers\Controller;
use App\Models\Postulante;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Styde\Html\Facades\Alert;
class FotosController extends Controller
{
    public function index()
    {
    	$postulante = Postulante::where('foto_estado','CARGADO')->orderBy('fecha_foto')->first();
        $resumen = Postulante::select('foto_estado',DB::raw('count(*) as cantidad'))->Activos()->groupBy('foto_estado')->get();
    	if(isset($postulante)){
           return view('admin.fotos.index',compact('postulante','resumen'));
        }else{
           Alert::success('No hay Foto por Editar');
           return view('admin.fotos.blank',compact('resumen'));
        }
    }
    public function update($id,$estado)
    {
    	$postulante = Postulante::find($id);
    	$archivo = 'public/'.$postulante->foto;
        $nuevo_archivo = 'public/fotosok/'.$postulante->dni.extension($archivo);
    	$nuevo_archivo_tmp = 'public/fotosok/tmp/'.$postulante->dni.extension($archivo);

    	switch ($estado) {
    		case '1':
                $postulante->foto_estado = 'ACEPTADO';
    			$postulante->mensaje = null;
    			$postulante->save();
                Storage::copy($archivo, $nuevo_archivo);
                Storage::copy($archivo, $nuevo_archivo_tmp);
    			break;

    		case '0':
                $postulante->foto_estado = 'RECHAZADO';
                $postulante->foto_rechazo = $postulante->foto;
                $postulante->foto = 'avatar/nofoto.jpg';
    			$postulante->mensaje = 'Su foto ha sido rechazada';
    			$postulante->save();
    			break;
    	}
    	return redirect()->route('admin.fotos.index');
    }
    public function cargareditado(Request $request)
    {
        $postulante = Postulante::find($request->idpostulante);
        $postulante->foto_estado = 'ACEPTADO';
        $postulante->foto_rechazo = null;
        $postulante->mensaje = null;

        $fileContents = file_get_contents($request->nueva_imagen);
        $nuevo_archivo = 'fotosok/'.$postulante->dni.extension($postulante->foto);

        Storage::disk('public')->put($nuevo_archivo,$fileContents);
        $postulante->foto = $nuevo_archivo;
        $postulante->save();

        $archivo = 'public/'.$postulante->foto;
        $nuevo_archivo_tmp = 'public/fotosok/tmp/'.$postulante->dni.extension($archivo);
        Storage::copy($archivo, $nuevo_archivo_tmp);
    }


}
