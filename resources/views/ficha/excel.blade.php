@extends('layouts.pdf')

@section('title', 'Ficha de Diagnóstico ' . $ficha->id)

@section('style')
<style>
    .center{
        text-align: center;
    }
    table{
        font-size: small;
    }
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
@endsection

@section('content')
<table class="table">
    <tr>
        <th colspan="3">Nombre de la Plataforma / Punto de Atención:</th>
        <td colspan="7">
            {{ $ficha->puntoAtencion->nombre }}
        </td>
    </tr>

    <tr>
        <th rowspan="2">Ubicación:</th>
        <th>Zona:</th>
        <td colspan="2">
            {{ $ficha->zona }}
        </td>
        <th>Calle:</th>
        <td colspan="2">
            {{ $ficha->calle }}
        </td>
        <th>Número:</th>
        <td colspan="2">
            {{ $ficha->numero }}
        </td>
    </tr>

    <tr>
        <th>Ubicación:</th>
        <th>Nombre del Edificio:</th>
        <td colspan="2">
            {{ $ficha->nombre_edificio }}
        </td>
        <th>Piso:</th>
        <td colspan="2">
            {{ $ficha->piso }}
        </td>
        <th>Referencia:</th>
        <td colspan="2">
            {{ $ficha->referencia }}
        </td>
    </tr>

    <tr>
        <th colspan="2">Cantidad de Funcionarios:</th>
        <th>1ra. Línea</th>
        <td colspan="3" class="center">
            {{ $ficha->funcionarios_linea_1 }}
        </td>
        <th>2da. Línea</th>
        <td colspan="3" class="center">
            {{ $ficha->funcionarios_linea_2 }}
        </td>
    </tr>

    <tr>
        <th colspan="2">Horario de Atención:</th>
        <th>Lunes - Viernes</th>
        <td class="center">
            de {{ $ficha->lunes_viernes_de }} a {{ $ficha->lunes_viernes_a }}
        </td>
        <th>Sábados</th>
        <td class="center">
            de {{ $ficha->sabado_de }} a {{ $ficha->sabado_a }}
        </td>
        <th>Otros</th>
        <td colspan="3">
            {{ $ficha->otro }}
        </td>
    </tr>

    <tr>
        <th colspan="3">La Plataforma / Punto de Atención tiene</th>
        <th class="center">TIENE</th>
        <th colspan="2" class="center">CANTIDAD</th>
        <th colspan="4" class="center">ESTADO ACTUAL</th>
    </tr>

    <tr>
        <th colspan="3">Señaletica externa de acceso a la plataforma / punto de atención</th>
        <td class="center">
            @if($ficha->tiene_senaletica)
            Si
            @else
            No
            @endif
        </td>
        <td colspan="2" class="center">
            {{ $ficha->cantidad_senaletica }}
        </td>
        <td colspan="4">
            {{ $ficha->estado_senaletica }}
        </td>
    </tr>

    <tr>
        <th colspan="3">Paneles de Información</th>
        <td class="center">
            @if($ficha->tiene_paneles)
            Si
            @else
            No
            @endif
        </td>
        <td colspan="2" class="center">
            {{ $ficha->cantidad_paneles }}
        </td>
        <td colspan="4">
            {{ $ficha->estado_paneles }}
        </td>
    </tr>

    <tr>
        <th colspan="3">Iluminación</th>
        <td class="center">
            @if($ficha->tiene_iluminacion)
            Si
            @else
            No
            @endif
        </td>
        <td colspan="2" class="center">
            {{ $ficha->cantidad_iluminacion }}
        </td>
        <td colspan="4">
            {{ $ficha->estado_iluminacion }}
        </td>
    </tr>

    <tr>
        <th colspan="3">Limpieza (Basureros para el ciudadano)</th>
        <td class="center">
            @if($ficha->tiene_limpieza_ciudadano)
            Si
            @else
            No
            @endif
        </td>
        <td colspan="2" class="center">
            {{ $ficha->cantidad_limpieza_ciudadano }}
        </td>
        <td colspan="4">
            {{ $ficha->estado_limpieza_ciudadano }}
        </td>
    </tr>

    <tr>
        <th colspan="3">Limpieza (Basureros para los operadores)</th>
        <td class="center">
            @if($ficha->tiene_limpieza_operadores)
            Si
            @else
            No
            @endif
        </td>
        <td colspan="2" class="center">
            {{ $ficha->cantidad_limpieza_operadores }}
        </td>
        <td colspan="4">
            {{ $ficha->estado_limpieza_operadores }}
        </td>
    </tr>

    <tr>
        <th colspan="3">Asientos para la atención del servidor público</th>
        <td class="center">
            @if($ficha->tiene_asientos_publico)
            Si
            @else
            No
            @endif
        </td>
        <td class="center">
            {{ $ficha->cantidad_parados_asientos_publico }}
        </td>
        <td class="center">
            {{ $ficha->cantidad_sentados_asientos_publico }}
        </td>
        <td colspan="4">
            {{ $ficha->estado_asientos_publico }}
        </td>
    </tr>

    <tr>
        <th colspan="3">Asientos para el usuario</th>
        <td class="center">
            @if($ficha->tiene_asientos_usuario)
            Si
            @else
            No
            @endif
        </td>
        <td class="center">
            {{ $ficha->cantidad_parados_asientos_usuario }}
        </td>
        <td class="center">
            {{ $ficha->cantidad_sentados_asientos_usuario }}
        </td>
        <td colspan="4">
            {{ $ficha->estado_asientos_usuario }}
        </td>
    </tr>

    <tr>
        <th colspan="4">Tipo de Plataforma / puntos de atención:</th>
        <th>Escritorio</th>
        <td class="center">
            @if($ficha->brinda_escritorio)
            Si
            @else
            No
            @endif
        </td>
        <th>Ventanilla</th>
        <td class="center">
            @if($ficha->brinda_ventanilla)
            Si
            @else
            No
            @endif
        </td>
        <th>Mesón</th>
        <td class="center">
            @if($ficha->brinda_meson)
            Si
            @else
            No
            @endif
        </td>
    </tr>

    <tr>
        <th colspan="4">Brindan Información al ciudadano por medio de:</th>
        <th>Folletos</th>
        <td class="center">
            @if($ficha->brinda_folletos)
            Si
            @else
            No
            @endif
        </td>
        <th>Fotocopias</th>
        <td class="center">
            @if($ficha->brinda_fotocopias)
            Si
            @else
            No
            @endif
        </td>
        <th>Trípticos</th>
        <td class="center">
            @if($ficha->brinda_tripticos)
            Si
            @else
            No
            @endif
        </td>
    </tr>

    <tr>
        <td colspan="4"></td>
        <th>Plataforma Virtual (WEB)</th>
        <td class="center">
            @if($ficha->brinda_web)
            Si
            @else
            No
            @endif
        </td>
        <th>Plataforma Telefónica</th>
        <td class="center">
            @if($ficha->brinda_telefono)
            Si
            @else
            No
            @endif
        </td>
        <th>Verbal</th>
        <td class="center">
            @if($ficha->brinda_verbal)
            Si
            @else
            No
            @endif
        </td>
    </tr>

    <tr>
        <th colspan="4">Requerimientos para mejorar la Plataforma / Punto de Atención al ciudadano</th>
        <td colspan="6">
            {{ $ficha->requerimientos }}
        </td>
    </tr>
</table>
@endsection
