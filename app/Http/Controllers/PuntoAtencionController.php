<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PuntoAtencionRequest;

use App\PuntoAtencion;
use App\UnidadOrganizacional;

class PuntoAtencionController extends Controller
{
    public function __construct(){
        $this->middleware('tecnico');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $puntos = PuntoAtencion::where('unidad_organizacional_id', '=', $request->user()->unidad_organizacional_id)->orderBy('nombre', 'ASC')->get();

        return view('punto.index')->with('puntos', $puntos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $unidades = UnidadOrganizacional::where('id', '=', $request->user()->unidad_organizacional_id)->orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('punto.create')->with('unidades', $unidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PuntoAtencionRequest $request)
    {
        $this->validate($request, [
            'nombre' => 'unique:puntos_atencion,nombre,NULL,id,unidad_organizacional_id,'.$request->unidad_organizacional_id,
        ]);
        try{
            $punto = new PuntoAtencion($request->all());

            $punto->save();

            flash('Se registró el punto de atención ' . $punto->nombre . ' para la unidad organizacional ' . $punto->unidadOrganizacional->nombre, 'success');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar registrar el punto de atención. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('punto_atencion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $punto = PuntoAtencion::find($id);

        return view('punto.show')->with('punto', $punto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $punto = PuntoAtencion::find($id);
        $unidades = UnidadOrganizacional::where('id', '=', $request->user()->unidad_organizacional_id)->orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('punto.edit')->with('punto', $punto)->with('unidades', $unidades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PuntoAtencionRequest $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'unique:puntos_atencion,nombre,NULL,id,unidad_organizacional_id,'.$request->unidad_organizacional_id,
        ]);
        try{
            $punto = PuntoAtencion::find($id);
            $punto->fill($request->all());

            $punto->update();

            flash('Se modificó el registro del punto de atención ' . $punto->nombre . ' para la unidad organizacional ' . $punto->unidadOrganizacional->nombre, 'warning');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar modificar el registro del punto de atención. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('punto_atencion.index');
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
            $punto = PuntoAtencion::find($id);

            $punto->delete();

            flash('Se eliminó el registro del punto de atención ' . $punto->nombre . ' para la unidad organizacional ' . $punto->unidadOrganizacional->nombre, 'danger');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar eliminar el registro del punto de atención. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('punto_atencion.index');
    }
}
