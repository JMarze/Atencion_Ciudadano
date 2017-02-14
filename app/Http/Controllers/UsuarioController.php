<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;

use App\User;
use App\UnidadOrganizacional;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()){
            $usuarios = User::orderBy('type', 'ASC')->where('id', '<>', $request->user()->id)->get();

            return view('usuario.index')->with('usuarios', $usuarios);
        }else{
            return redirect('/');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = UnidadOrganizacional::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('usuario.create')->with('unidades', $unidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|between:3,250',
        ]);
        try{
            $usuario = new User($request->all());
            $usuario->password = bcrypt($request->password);

            $usuario->save();

            flash('Se registró al usuario ' . $usuario->name . ' con el privilegio de ' . $usuario->type, 'success');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar registrar al usuario. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);

        return view('usuario.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $unidades = UnidadOrganizacional::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('usuario.edit')->with('usuario', $usuario)->with('unidades', $unidades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if($request->chkpassword){
            $this->validate($request, [
                'password' => 'required|confirmed|between:3,250',
            ]);
        }
        try{
            $usuario = User::find($id);
            $usuario->fill($request->all());

            if($request->chkpassword){
                $usuario->password = bcrypt($request->password);
            }

            $usuario->update();

            flash('Se modificó el registro del usuario ' . $usuario->name, 'warning');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar modificar el registro del usuario. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('usuario.index');
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
            $usuario = User::find($id);

            $usuario->delete();

            flash('Se eliminó el registro del usuario ' . $usuario->name, 'danger');
        }catch(\Exception $ex){
            flash('Ocurrió un problema al intentar eliminar el registro del usuario. ' . $ex->getMessage(), 'danger');
        }

        return redirect()->route('usuario.index');
    }
}
