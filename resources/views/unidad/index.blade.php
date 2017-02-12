@extends('layouts.app')

@section('htmlheader_title')
	Unidades Organizacionales
@endsection

@section('contentheader_title')
	<i class="fa fa-cubes"></i> Unidades Organizacionales
@endsection

@section('main-content')
@if(count($unidades) > 0)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-list"></i> Lista de Unidades Organizacionales
        </h3>
        <div class="box-tools pull-right">
            <a href="{{ route('unidad.create') }}" class="btn btn-box-tool"><i class="fa fa-wpforms"></i> Agregar</a>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        <table class="table" id="table-usuarios">
            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>

            @foreach($unidades as $unidad)
            <tr>
                <td>{{ $unidad->nombre }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('unidad.edit', $unidad->id) }}" class="btn btn-sm btn-warning" type="button">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('unidad.show', $unidad->id) }}" class="btn btn-sm btn-danger" type="button">
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
    <p>No se encontraron registros para mostrar, intenta <a href="{{ route('unidad.create') }}">agregar</a> una nueva unidad organizacional</p>
</div>
@endif
@endsection

@section('scripts')
@parent
<script>
    $('#unidades').addClass('active');
</script>
@endsection
