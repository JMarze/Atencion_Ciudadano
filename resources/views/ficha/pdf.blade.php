@extends('layouts.pdf')

@section('title', 'Ficha de Diagnóstico ' . $ficha->id)

@section('style')
<style>
    .center{
        text-align: center;
    }
    table{
        font-size: small;
        width: 100%;
    }
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td{
        padding: 5px;
    }
</style>
@endsection

@section('content')
<div class="box-body">
    <table class="table">
        <tr>
            <th colspan="3" style="width:30%;">Nombre de la Plataforma / Punto de Atención:</th>
            <td colspan="7" style="width:70%;">
                {{ $ficha->puntoAtencion->nombre }}
            </td>
        </tr>

        <tr>
            <th colspan="1" rowspan="2" style="width:10%;">Ubicación:</th>
            <th colspan="1" style="width:10%;">Zona:</th>
            <td colspan="2" style="width:20%;">
                {{ $ficha->zona }}
            </td>
            <th colspan="1" style="width:10%;">Calle:</th>
            <td colspan="2" style="width:20%;">
                {{ $ficha->calle }}
            </td>
            <th colspan="1" style="width:10%;">Número:</th>
            <td colspan="2" style="width:20%;">
                {{ $ficha->numero }}
            </td>
        </tr>

        <tr>
            <th colspan="1" style="width:10%;">Nombre del Edificio:</th>
            <td colspan="2" style="width:20%;">
                {{ $ficha->nombre_edificio }}
            </td>
            <th colspan="1" style="width:10%;">Piso:</th>
            <td colspan="2" style="width:20%;">
                {{ $ficha->piso }}
            </td>
            <th colspan="1" style="width:10%;">Referencia:</th>
            <td colspan="2" style="width:20%;">
                {{ $ficha->referencia }}
            </td>
        </tr>

        <tr>
            <th colspan="2" style="width:20%;">Cantidad de Funcionarios:</th>
            <th colspan="1" style="width:10%;">1ra. Línea</th>
            <td colspan="3" style="width:30%;" class="center">
                {{ $ficha->funcionarios_linea_1 }}
            </td>
            <th colspan="1" style="width:10%;">2da. Línea</th>
            <td colspan="3" style="width:30%;" class="center">
                {{ $ficha->funcionarios_linea_2 }}
            </td>
        </tr>

        <tr>
            <th colspan="2" style="width:20%;">Horario de Atención:</th>
            <th colspan="1" style="width:10%;">Lunes - Viernes</th>
            <td colspan="1" style="width:10%;" class="center">
                {{ $ficha->lunes_viernes_de }}
                <br/>
                {{ $ficha->lunes_viernes_a }}
            </td>
            <th colspan="1" style="width:10%;">Sábados</th>
            <td colspan="1" style="width:10%;" class="center">
                {{ $ficha->sabado_de }}
                <br/>
                {{ $ficha->sabado_a }}
            </td>
            <th colspan="1" style="width:10%;">Otros</th>
            <td colspan="3" style="width:30%;">
                {{ $ficha->otro }}
            </td>
        </tr>

        <tr>
            <th colspan="3" style="width:30%;">La Plataforma / Punto de Atención tiene</th>
            <th class="center">TIENE</th>
            <th colspan="2" style="width:20%;" class="center">CANTIDAD</th>
            <th colspan="4" style="width:40%;" class="center">ESTADO ACTUAL</th>
        </tr>

        <tr>
            <th colspan="3" style="width:30%;">Señaletica externa de acceso a la plataforma / punto de atención</th>
            <td class="center">
                @if($ficha->tiene_senaletica)
                Si
                @else
                No
                @endif
            </td>
            <td colspan="2" style="width:20%;" class="center">
                {{ $ficha->cantidad_senaletica }}
            </td>
            <td colspan="4" style="width:40%;">
                {{ $ficha->estado_senaletica }}
            </td>
        </tr>

        <tr>
            <th colspan="3" style="width:30%;">Paneles de Información</th>
            <td class="center">
                @if($ficha->tiene_paneles)
                Si
                @else
                No
                @endif
            </td>
            <td colspan="2" style="width:20%;" class="center">
                {{ $ficha->cantidad_paneles }}
            </td>
            <td colspan="4" style="width:40%;">
                {{ $ficha->estado_paneles }}
            </td>
        </tr>

        <tr>
            <th colspan="3" style="width:30%;">Iluminación</th>
            <td class="center">
                @if($ficha->tiene_iluminacion)
                Si
                @else
                No
                @endif
            </td>
            <td colspan="2" style="width:20%;" class="center">
                {{ $ficha->cantidad_iluminacion }}
            </td>
            <td colspan="4" style="width:40%;">
                {{ $ficha->estado_iluminacion }}
            </td>
        </tr>

        <tr>
            <th colspan="3" style="width:30%;">Limpieza (Basureros para el ciudadano)</th>
            <td class="center">
                @if($ficha->tiene_limpieza_ciudadano)
                Si
                @else
                No
                @endif
            </td>
            <td colspan="2" style="width:20%;" class="center">
                {{ $ficha->cantidad_limpieza_ciudadano }}
            </td>
            <td colspan="4" style="width:40%;">
                {{ $ficha->estado_limpieza_ciudadano }}
            </td>
        </tr>

        <tr>
            <th colspan="3" style="width:30%;">Limpieza (Basureros para los operadores)</th>
            <td class="center">
                @if($ficha->tiene_limpieza_operadores)
                Si
                @else
                No
                @endif
            </td>
            <td colspan="2" style="width:20%;" class="center">
                {{ $ficha->cantidad_limpieza_operadores }}
            </td>
            <td colspan="4" style="width:40%;">
                {{ $ficha->estado_limpieza_operadores }}
            </td>
        </tr>

        <tr>
            <th colspan="3" style="width:30%;">Asientos para la atención del servidor público</th>
            <td class="center">
                @if($ficha->tiene_asientos_publico)
                Si
                @else
                No
                @endif
            </td>
            <td colspan="1" style="width:10%;" class="center">
                {{ $ficha->cantidad_parados_asientos_publico }}
            </td>
            <td colspan="1" style="width:10%;" class="center">
                {{ $ficha->cantidad_sentados_asientos_publico }}
            </td>
            <td colspan="4" style="width:40%;">
                {{ $ficha->estado_asientos_publico }}
            </td>
        </tr>

        <tr>
            <th colspan="3" style="width:30%;">Asientos para el usuario</th>
            <td class="center">
                @if($ficha->tiene_asientos_usuario)
                Si
                @else
                No
                @endif
            </td>
            <td colspan="1" style="width:10%;" class="center">
                {{ $ficha->cantidad_parados_asientos_usuario }}
            </td>
            <td colspan="1" style="width:10%;" class="center">
                {{ $ficha->cantidad_sentados_asientos_usuario }}
            </td>
            <td colspan="4" style="width:40%;">
                {{ $ficha->estado_asientos_usuario }}
            </td>
        </tr>

        <tr>
            <th colspan="4" style="width:40%;">Tipo de Plataforma / puntos de atención:</th>
            <th style="width: 10%;">Escritorio</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_escritorio)
                Si
                @else
                No
                @endif
            </td>
            <th style="width: 10%;">Ventanilla</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_ventanilla)
                Si
                @else
                No
                @endif
            </td>
            <th style="width: 10%;">Mesón</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_meson)
                Si
                @else
                No
                @endif
            </td>
        </tr>

        <tr>
            <th colspan="4" rowspan="2" style="width:40%;">Brindan Información al ciudadano por medio de:</th>
            <th style="width: 10%;">Folletos</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_folletos)
                Si
                @else
                No
                @endif
            </td>
            <th style="width: 10%;">Fotocopias</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_fotocopias)
                Si
                @else
                No
                @endif
            </td>
            <th style="width: 10%;">Trípticos</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_tripticos)
                Si
                @else
                No
                @endif
            </td>
        </tr>

        <tr>
            <th style="width: 10%;">Plataforma Virtual (WEB)</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_web)
                Si
                @else
                No
                @endif
            </td>
            <th style="width: 10%;">Plataforma Telefónica</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_telefono)
                Si
                @else
                No
                @endif
            </td>
            <th style="width: 10%;">Verbal</th>
            <td style="width: 10%;" class="center">
                @if($ficha->brinda_verbal)
                Si
                @else
                No
                @endif
            </td>
        </tr>

        <tr>
            <th colspan="4" style="width:40%;">Requerimientos para mejorar la Plataforma / Punto de Atención al ciudadano</th>
            <td colspan="6" style="width:60%;">
                {{ $ficha->requerimientos }}
            </td>
        </tr>
    </table>

</div><!-- /.box-body -->
@endsection
