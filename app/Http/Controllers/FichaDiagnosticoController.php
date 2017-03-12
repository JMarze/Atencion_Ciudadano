<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FichaDiagnosticoRequest;

use App\FichaDiagnostico;
use App\PuntoAtencion;

use DB;

use Carbon\Carbon;

use Excel;

class FichaDiagnosticoController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');

        // index: admin, tecnico, jefe
        // create, store: tecnico
        // edit, update: jefe
        // show, destroy: admin

        /*$this->middleware('admin', ['only' => [
            'show', 'destroy',
        ]]);

        $this->middleware('tecnico', ['only' => [
            'create', 'store', 'edit', 'update',
        ]]);

        $this->middleware('jefe', ['only' => [
            'edit', 'update',
        ]]);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->type == 'admin'){
            $fichas = FichaDiagnostico::orderBy('fichas_diagnostico.updated_at', 'DESC')->get();
        }else{
            $fichas = FichaDiagnostico::join('puntos_atencion', 'puntos_atencion.id', '=', 'fichas_diagnostico.punto_atencion_id')->where('puntos_atencion.unidad_organizacional_id', '=', $request->user()->unidad_organizacional_id)->select('fichas_diagnostico.*')->orderBy('fichas_diagnostico.updated_at', 'DESC')->get();
        }

        return view('ficha.index')->with('fichas', $fichas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->type != 'tecnico'){
            abort(404);
        }

        $puntos = PuntoAtencion::join('unidades_organizacionales', 'puntos_atencion.unidad_organizacional_id', '=', 'unidades_organizacionales.id')->where('unidades_organizacionales.id', '=', $request->user()->unidad_organizacional_id)->orderBy('puntos_atencion.nombre', 'ASC')->select('puntos_atencion.id', DB::raw('CONCAT(puntos_atencion.nombre, " [", unidades_organizacionales.nombre, "]") AS punto'))->pluck('punto', 'puntos_atencion.id');

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
        if($request->user()->type != 'tecnico'){
            abort(404);
        }

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
    public function show(Request $request, $id)
    {
        if($request->user()->type != 'admin'){
            abort(404);
        }

        $ficha = FichaDiagnostico::find($id);

        return view('ficha.show')->with('ficha', $ficha);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->user()->type != 'tecnico' && $request->user()->type != 'jefe'){
            abort(404);
        }

        $ficha = FichaDiagnostico::find($id);
        $puntos = PuntoAtencion::join('unidades_organizacionales', 'puntos_atencion.unidad_organizacional_id', '=', 'unidades_organizacionales.id')->where('unidades_organizacionales.id', '=', $request->user()->unidad_organizacional_id)->orderBy('puntos_atencion.nombre', 'ASC')->select('puntos_atencion.id', DB::raw('CONCAT(puntos_atencion.nombre, " [", unidades_organizacionales.nombre, "]") AS punto'))->pluck('punto', 'puntos_atencion.id');

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
        if($request->user()->type != 'tecnico' && $request->user()->type != 'jefe'){
            abort(404);
        }

        try{
            $ficha = FichaDiagnostico::find($id);
            $ficha->fill($request->all());

            if($request->user()->type == 'tecnico'){
                $ficha->user_id = $request->user()->id;
            }elseif($request->user()->type == 'jefe'){
                $ficha->revisadoPor()->detach();
                $ficha->revisadoPor()->attach($request->user()->id);
            }

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
    public function destroy(Request $request, $id)
    {
        if($request->user()->type != 'admin'){
            abort(404);
        }

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

    /**
     * Display PDF
     *
     * @param int $idFichaDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function pdf($idFichaDiagnostico){
        $ficha = FichaDiagnostico::find($idFichaDiagnostico);
        $view = \View::make('ficha.pdf', compact('ficha'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('Ficha_' . $ficha->id . '.pdf');
    }

    /**
     * Download Excel
     *
     * @param int $idFichaDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function excel($idFichaDiagnostico){
        $ficha = FichaDiagnostico::find($idFichaDiagnostico);

        Excel::create('FichaDiagnóstico_' . $ficha->id, function($excel) use($ficha){
            $excel->sheet('Ficha', function($sheet) use ($ficha){
                $sheet->loadView('ficha.excel', array('ficha' => $ficha));
            });
        })->download('xlsx');
    }

    /**
     * See changes
     *
     * @param int $idFichaDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function cambios($idFichaDiagnostico){
        $ficha = FichaDiagnostico::find($idFichaDiagnostico);

        return view('ficha.cambio')->with('ficha', $ficha);
    }
}
