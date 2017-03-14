@extends('layouts.app')

@section('htmlheader_title')
	Servidor Municipal
@endsection

@section('contentheader_title')
	<i class="fa fa-user-plus"></i> Servidor Municipal
@endsection

@section('main-content')
@if(count($servidor->cambioPor) > 0)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-list"></i> Lista de Cambios en Servidor Municipal {{ $servidor->id }}
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        <table class="table">
            <tr>
                <th>Usuario</th>
                <th>Nivel</th>
                <th>Campo</th>
                <th>Valor Anterior</th>
                <th>Valor Nuevo</th>
                <th>Modificado</th>
            </tr>

            @foreach($servidor->cambioPor as $cambio)
            <tr>
                <td>{{ $cambio->username }}</td>
                <td>
                    @if($cambio->type == 'admin')
                    <span class="label label-success">admin</span>
                    @elseif($cambio->type == 'tecnico')
                    <span class="label label-primary">técnico</span>
                    @elseif($cambio->type == 'tecnico_web')
                    <span class="label label-info">técnico web</span>
                    @elseif($cambio->type == 'jefe')
                    <span class="label label-warning">jefe</span>
                    @endif
                </td>
                <td>{{ $cambio->pivot->campo }}</td>
                <td>{{ $cambio->pivot->valor_anterior }}</td>
                <td>{{ $cambio->pivot->valor_nuevo }}</td>
                <td>{{ $cambio->pivot->fecha_cambio }}</td>
            </tr>
            @endforeach
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@else
<div class="callout callout-info">
    <h4><i class="fa fa-database"></i> Whoops!</h4>
    <p>No se encontraron cambios para mostrar...</p>
</div>
@endif
@endsection

@section('scripts')
@parent
<script>
    $('#servidores').addClass('active');
</script>
@endsection
