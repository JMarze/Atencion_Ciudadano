@extends('layouts.app')

@section('htmlheader_title')
	Puntos de Atención
@endsection

@section('contentheader_title')
	<i class="fa fa-cube"></i> Puntos de Atención
@endsection

@section('main-content')
@if(count($puntos) > 0)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-list"></i> Lista de Puntos de Atención
        </h3>
        <div class="box-tools pull-right">
            <a href="{{ route('punto_atencion.create') }}" class="btn btn-box-tool"><i class="fa fa-wpforms"></i> Agregar</a>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Unidad Organizacional</th>
                <th>Tipo</th>
                <th></th>
            </tr>

            @foreach($puntos as $punto)
            <tr>
                <td>{{ $punto->nombre }}</td>
                <td>{{ $punto->unidadOrganizacional->nombre }}</td>
                <td>
                    @if($punto->tipo == 'servicio')
                    <span class="label label-success">servicio</span>
                    @elseif($punto->tipo == 'tramite')
                    <span class="label label-primary">trámite</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('punto_atencion.edit', $punto->id) }}" class="btn btn-sm btn-warning" type="button">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('punto_atencion.show', $punto->id) }}" class="btn btn-sm btn-danger" type="button">
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
    <p>No se encontraron registros para mostrar, intenta <a href="{{ route('punto_atencion.create') }}">agregar</a> un nuevo punto de atención</p>
</div>
@endif
@endsection

@section('scripts')
@parent
<script>
    $('#puntos').addClass('active');
</script>
@endsection
