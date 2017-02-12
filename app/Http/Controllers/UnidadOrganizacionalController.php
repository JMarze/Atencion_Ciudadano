<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UnidadOrganizacionalRequest;

use App\UnidadOrganizacional;

class UnidadOrganizacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = UnidadOrganizacional::orderBy('nombre', 'ASC')->get();

        return view('unidad.index')->with('unidades', $unidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnidadOrganizacionalRequest $request)
    {
        try{
            $unidad = new UnidadOrganizacional($request->all());

            $unidad->save();

            flash('Se registró la unidad organizacional ' . $unidad->nombre, 'success');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar registrar la unidad organizacional. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('unidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidad = UnidadOrganizacional::find($id);

        return view('unidad.show')->with('unidad', $unidad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad = UnidadOrganizacional::find($id);

        return view('unidad.edit')->with('unidad', $unidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnidadOrganizacionalRequest $request, $id)
    {
        try{
            $unidad = UnidadOrganizacional::find($id);
            $unidad->fill($request->all());

            $unidad->update();

            flash('Se modificó el registro de la unidad organizacional ' . $unidad->nombre, 'warning');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar modificar el registro de la unidad organizacional. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('unidad.index');
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
            $unidad = UnidadOrganizacional::find($id);

            foreach($unidad->puntosAtencion as $punto){
                $punto->delete();
            }

            $unidad->delete();

            flash('Se eliminó el registro de la unidad organizacional ' . $unidad->nombre, 'danger');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar eliminar el registro de la unidad organizacional. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('unidad.index');
    }
}
