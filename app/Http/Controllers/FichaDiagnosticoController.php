<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FichaDiagnosticoRequest;

use App\FichaDiagnostico;
use App\PuntoAtencion;

use DB;

use Carbon\Carbon;

class FichaDiagnosticoController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichas = FichaDiagnostico::orderBy('updated_at', 'DESC')->get();

        return view('ficha.index')->with('fichas', $fichas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puntos = PuntoAtencion::join('unidades_organizacionales', 'puntos_atencion.unidad_organizacional_id', '=', 'unidades_organizacionales.id')->orderBy('puntos_atencion.nombre', 'ASC')->select('puntos_atencion.id', DB::raw('CONCAT(puntos_atencion.nombre, " [", unidades_organizacionales.nombre, "]") AS punto'))->pluck('punto', 'puntos_atencion.id');

        return view('ficha.create')->with('puntos', $puntos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FichaDiagnosticoRequest $request)
    {
        try{
            $ficha = new FichaDiagnostico($request->all());
            $ficha->user_id = $request->user()->id;

            $ficha->save();

            flash('Se registró la ficha de diagnóstico para el punto de atención ' . $ficha->puntoAtencion->nombre, 'success');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar registrar la ficha de diagnóstico. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('ficha_diagnostico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ficha = FichaDiagnostico::find($id);

        return view('ficha.show')->with('ficha', $ficha);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ficha = FichaDiagnostico::find($id);
        $puntos = PuntoAtencion::join('unidades_organizacionales', 'puntos_atencion.unidad_organizacional_id', '=', 'unidades_organizacionales.id')->orderBy('puntos_atencion.nombre', 'ASC')->select('puntos_atencion.id', DB::raw('CONCAT(puntos_atencion.nombre, " [", unidades_organizacionales.nombre, "]") AS punto'))->pluck('punto', 'puntos_atencion.id');

        return view('ficha.edit')->with('ficha', $ficha)->with('puntos', $puntos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FichaDiagnosticoRequest $request, $id)
    {
        try{
            $ficha = FichaDiagnostico::find($id);
            $ficha->fill($request->all());
            $ficha->revisadoPor()->attach($request->user()->id);
            $ficha->updated_at = Carbon::now();

            $ficha->update();

            flash('Se revisó la ficha de diagnóstico para el punto de atención ' . $ficha->puntoAtencion->nombre, 'warning');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar modificar el registro de la ficha de diagnóstico. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('ficha_diagnostico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $ficha = FichaDiagnostico::find($id);
            $ficha->revisadoPor()->detach();

            $ficha->delete();

            flash('Se eliminó la ficha de diagnóstico del punto de atención ' . $ficha->puntoAtencion->nombre, 'danger');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar eliminar el registro de la ficha de diagnóstico. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('ficha_diagnostico.index');
    }
}
