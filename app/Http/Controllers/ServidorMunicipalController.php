<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ServidorMunicipalRequest;

use App\ServidorMunicipal;
use App\PuntoAtencion;

use DB;

use Carbon\Carbon;

class ServidorMunicipalController extends Controller
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
        $servidores = ServidorMunicipal::orderBy('updated_at', 'DESC')->get();

        return view('servidor.index')->with('servidores', $servidores);
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

        return view('servidor.create')->with('puntos', $puntos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServidorMunicipalRequest $request)
    {
        if($request->user()->type != 'tecnico'){
            abort(404);
        }

        try{
            $servidor = new ServidorMunicipal($request->all());
            $servidor->user_id = $request->user()->id;

            $servidor->save();

            flash('Se registró al servidor municipal para el punto de atención ' . $servidor->puntoAtencion->nombre, 'success');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar registrar al servidor municipal. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('servidor_municipal.index');
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

        $servidor = ServidorMunicipal::find($id);

        return view('servidor.show')->with('servidor', $servidor);
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

        $servidor = ServidorMunicipal::find($id);
        $puntos = PuntoAtencion::join('unidades_organizacionales', 'puntos_atencion.unidad_organizacional_id', '=', 'unidades_organizacionales.id')->where('unidades_organizacionales.id', '=', $request->user()->unidad_organizacional_id)->orderBy('puntos_atencion.nombre', 'ASC')->select('puntos_atencion.id', DB::raw('CONCAT(puntos_atencion.nombre, " [", unidades_organizacionales.nombre, "]") AS punto'))->pluck('punto', 'puntos_atencion.id');

        return view('servidor.edit')->with('servidor', $servidor)->with('puntos', $puntos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServidorMunicipalRequest $request, $id)
    {
        if($request->user()->type != 'tecnico' && $request->user()->type != 'jefe'){
            abort(404);
        }

        try{
            $servidor = ServidorMunicipal::find($id);
            $servidor->fill($request->all());

            if($request->user()->type == 'tecnico'){
                $servidor->user_id = $request->user()->id;
            }elseif($request->user()->type == 'jefe'){
                $servidor->revisadoPor()->detach();
                $servidor->revisadoPor()->attach($request->user()->id);
            }

            $servidor->updated_at = Carbon::now();

            $servidor->update();

            flash('Se revisó al servidor municipal para el punto de atención ' . $servidor->puntoAtencion->nombre, 'warning');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar modificar el registro del servidor municipal. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('servidor_municipal.index');
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
            $servidor = ServidorMunicipal::find($id);
            $servidor->revisadoPor()->detach();

            $servidor->delete();

            flash('Se eliminó al servidor municipal del punto de atención ' . $servidor->puntoAtencion->nombre, 'danger');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar eliminar el registro del servidor municipal. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('servidor_municipal.index');
    }

    /**
     * See changes
     *
     * @param int $idServidorMunicipal
     * @return \Illuminate\Http\Response
     */
    public function cambios($idServidorMunicipal){
        $servidor = ServidorMunicipal::find($idServidorMunicipal);

        return view('servidor.cambio')->with('servidor', $servidor);
    }
}
