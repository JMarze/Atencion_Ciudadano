<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\UnidadOrganizacional;
use App\PuntoAtencion;
use App\FichaDiagnostico;
use App\ServidorMunicipal;

use DB;

use Excel;

class ReporteController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(Request $request){
        $unidades = UnidadOrganizacional::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $puntos = PuntoAtencion::join('unidades_organizacionales', 'puntos_atencion.unidad_organizacional_id', '=', 'unidades_organizacionales.id')->orderBy('puntos_atencion.nombre', 'ASC')->select('puntos_atencion.id', DB::raw('CONCAT(puntos_atencion.nombre, " [", unidades_organizacionales.nombre, "]") AS punto'))->pluck('punto', 'puntos_atencion.id');

        return view('reporte.index')->with('unidades', $unidades)->with('puntos', $puntos);
    }

    public function reporte(Request $request){
        $fichas = FichaDiagnostico::orderBy('id', 'ASC');

        if(isset($request->unidad_organizacional_id)){
            $fichas->join('puntos_atencion', 'fichas_diagnostico.punto_atencion_id', '=', 'puntos_atencion.id');
            foreach($request->unidad_organizacional_id as $unidad){
                $fichas = $fichas->orWhere('puntos_atencion.unidad_organizacional_id', $unidad);
            }
        }

        if(isset($request->punto_atencion_id)){
            foreach($request->punto_atencion_id as $punto){
                $fichas = $fichas->orWhere('fichas_diagnostico.punto_atencion_id', $punto);
            }
        }

        if(isset($request->tipo)){
            $fichas->join('puntos_atencion', 'fichas_diagnostico.punto_atencion_id', '=', 'puntos_atencion.id');
            foreach($request->tipo as $tipo){
                $fichas = $fichas->orWhere('puntos_atencion.tipo', $tipo);
            }
        }

        $fichas = $fichas->select('fichas_diagnostico.*')->get();

        $campos = collect($request->campos);

        if($request->tipo_archivo == 'pdf'){
            $view = \View::make('reporte.pdf', compact('fichas', 'campos'))->render();

            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            return $pdf->stream('Reporte.pdf');
        }else{
            Excel::create('Reporte', function($excel) use ($fichas, $campos){
                $excel->sheet('Ficha', function($sheet) use ($fichas, $campos){
                    $sheet->loadView('reporte.excel', array('fichas' => $fichas, 'campos' => $campos));
                });
            })->download('xlsx');
        }

        //return view('reporte.pdf')->with('fichas', $fichas);
    }
}
