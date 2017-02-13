@extends('layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection

@section('contentheader_title')
	<i class="fa fa-user"></i> Usuarios
@endsection

@section('main-content')
@if(count($usuarios) > 0)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-list"></i> Lista de Usuarios
        </h3>
        <div class="box-tools pull-right">
            <a href="{{ route('usuario.create') }}" class="btn btn-box-tool"><i class="fa fa-wpforms"></i> Agregar</a>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        <table class="table" id="table-usuarios">
            <tr>
                <th>Usuario</th>
                <th>Nombre Completo</th>
                <th>Correo Electrónico</th>
                <th>Nivel</th>
                <th>Unidad Organizacional</th>
                <th></th>
            </tr>

            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->username }}</td>
                <td>{{ $usuario->name }}</td>
                <td>
                    <a href="mailto:{{ $usuario->email }}">{{ $usuario->email }}</a>
                </td>
                <td>
                    @if($usuario->type == 'admin')
                    <span class="label label-success">admin</span>
                    @elseif($usuario->type == 'tecnico')
                    <span class="label label-primary">técnico</span>
                    @elseif($usuario->type == 'tecnico_web')
                    <span class="label label-info">técnico web</span>
                    @elseif($usuario->type == 'jefe')
                    <span class="label label-warning">jefe</span>
                    @endif
                </td>
                <td>{{ $usuario->unidadOrganizacional->nombre }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-sm btn-warning" type="button">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-sm btn-danger" type="button">
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
    <p>No se encontraron registros para mostrar, intenta <a href="{{ route('usuario.create') }}">agregar</a> un nuevo usuario</p>
</div>
@endif
@endsection

@section('scripts')
@parent
<script>
    $('#usuarios').addClass('active');
</script>
@endsection
