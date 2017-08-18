<?php

namespace App\Http\Controllers\Admin\Aulas;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use DB;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;
class AulasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.aulas.index');
    }
    public function ordenar()
    {
        $aulas = Aula::Activas()->orderBy('sector','asc')->orderBy('codigo','asc')->get();
        $k = 1;
        $sector = $aulas->first()->sector;
        $varAulas = $aulas->toArray();
        for ($i=0; $i < $aulas->count(); $i++) {
            if ($sector!=$varAulas[$i]['sector']){$k=1;$sector=$varAulas[$i]['sector'];}
            Aula::where('id',$varAulas[$i]['id'])->update(['orden'=>$k]);
            $k++;
        }

        return back();
    }

    public function activaraulas(Request $request)
    {
        $data = $request->all();
        $aulas = Aula::whereIn('id',$data['idaulas'])->update(['activo'=>true]);

        Alert::success('Aulas activadas con exito');
        return redirect()->route('admin.aulas.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AulaRequest $request)
    {
        Aula::create($request->all());
        Alert::success('Aula Registrada con exito');
        return back();
    }
    public function disponible(Request $request)
    {
        $data = $request->all();

        Aula::where('sector',$data['sector'])->Activas()->update(['disponible'=>$data['disponible']]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aula = Aula::find($id);
        return view('admin.aulas.edit',compact('aula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aula = Aula::find($id);
        $aula->fill($request->all());
        $aula->save();
        Alert::success('Aula actualizada con exito');
        return redirect()->route('admin.aulas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lista_aulas()
    {
        $Lista = Aula::all();
        $res['data'] = $Lista;
        return $res;
    }
    public function lista_aulas_activas()
    {
        $Lista = Aula::Activas()->get();
        $res['data'] = $Lista;
        return $res;
    }
    public function activar($id)
    {
        $aula = Aula::find($id);
        $aula->activo = !$aula->activo;
        $aula->save();

        Alert::success('Se realizo el proceso');
        return back();
    }
    public function delete($id)
    {
        Aula::destroy($id);
        Alert::success('Se elimino el aula con exito');
        return redirect()->route('admin.aulas.index');
    }
    public function activas()
    {
        $resumen = Aula::select('sector',DB::raw("sum(disponible) as cnt"))
                        ->Activas()
                        ->groupBy('sector')
                        ->orderBy('sector')
                        ->get();
        return view('admin.aulas.activas',compact('resumen'));
    }
}
