@extends('layouts.app')

@section('htmlheader_title')
	Fichas Diagnóstico
@endsection

@section('contentheader_title')
	<i class="fa fa-id-card"></i> Fichas Diagnóstico
@endsection

@section('main-content')
@if(count($fichas) > 0)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-list"></i> Lista de Fichas Diagnóstico
        </h3>
        <div class="box-tools pull-right">
            <a href="{{ route('ficha_diagnostico.create') }}" class="btn btn-box-tool"><i class="fa fa-wpforms"></i> Agregar</a>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        <table class="table">
            <tr>
                <th>Punto de Atención</th>
                <th>Unidad Organizacional</th>
                <th>Tipo</th>
                <th>Elaborado por</th>
                <th>Revisado por</th>
                <th></th>
            </tr>

            @foreach($fichas as $ficha)
            <tr>
                <td>{{ $ficha->puntoAtencion->nombre }}</td>
                <td>{{ $ficha->puntoAtencion->unidadOrganizacional->nombre }}</td>
                <td>
                    @if($ficha->puntoAtencion->tipo == 'servicio')
                    <span class="label label-success">servicio</span>
                    @elseif($ficha->puntoAtencion->tipo == 'tramite')
                    <span class="label label-primary">trámite</span>
                    @endif
                </td>
                <td>
                    {{ $ficha->elaboradoPor->username }} ({{ $ficha->created_at->diffForHumans() }})
                </td>
                <td>
                    @if(count($ficha->revisadoPor) > 0)
                        @foreach($ficha->revisadoPor as $revisor)
                        {{ $revisor->username }} ({{ $ficha->updated_at->diffForHumans() }})
                        @endforeach
                    @else
                    <a href="{{ route('ficha_diagnostico.edit', $ficha->id) }}" class="btn btn-sm btn-info" type="button">
                        <i class="fa fa-edit"></i> Revisar
                    </a>
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('ficha_diagnostico.show', $ficha->id) }}" class="btn btn-sm btn-danger" type="button">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@else
<div class="callout callout-info">
    <h4><i class="fa fa-database"></i> Whoops!</h4>
    <p>No se encontraron registros para mostrar, intenta <a href="{{ route('ficha_diagnostico.create') }}">agregar</a> una nueva ficha de diagnóstico</p>
</div>
@endif
@endsection

@section('scripts')
@parent
<script>
    $('#fichas').addClass('active');
</script>
@endsection
