@extends('layouts.app')

@section('htmlheader_title')
	Servidores Municipales
@endsection

@section('contentheader_title')
	<i class="fa fa-user-plus"></i> Servidores Municipales
@endsection

@section('main-content')
@if(count($servidores) > 0)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-list"></i> Lista de Servidores Municipales
        </h3>
        <div class="box-tools pull-right">
            <a href="{{ route('servidor_municipal.create') }}" class="btn btn-box-tool"><i class="fa fa-wpforms"></i> Agregar</a>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        <table class="table">
            <tr>
                <th>Punto de Atención</th>
                <th>Unidad Organizacional</th>
                <th>Nombre Completo</th>
                <th>Género</th>
                <th>Edad</th>
                <th>Cargo</th>
                <th>Puesto</th>
                <th>Turno</th>
                <th>Antiguedad</th>
                <th>Tipo</th>
                <th>Ubicación</th>
                <th>Elaborado por</th>
                <th>Revisado por</th>
                <th></th>
            </tr>

            @foreach($servidores as $servidor)
            <tr>
                <td>{{ $servidor->puntoAtencion->nombre }}</td>
                <td>{{ $servidor->puntoAtencion->unidadOrganizacional->nombre }}</td>
                <td>{{ $servidor->apellido_paterno }} {{ $servidor->apellido_materno }} {{ $servidor->nombre }}</td>
                <td>
                    @if($servidor->genero == 'femenino')
                    <span class="label label-default">Femenino</span>
                    @else
                    <span class="label label-default">Masculino</span>
                    @endif
                </td>
                <td>{{ $servidor->edad }} años</td>
                <td>{{ $servidor->cargo }}</td>
                <td>{{ $servidor->puesto }}</td>
                <td>{{ $servidor->turno }}</td>
                <td>{{ $servidor->antiguedad_años }} años y {{ $servidor->antiguedad_meses }} meses</td>
                <td>
                    @if($servidor->servidor == '1ra_linea')
                    <span class="label label-success">1ra Línea</span>
                    @elseif($servidor->servidor == '2da_linea')
                    <span class="label label-primary">2da Línea</span>
                    @else
                    <span class="label label-default">Contrato</span>
                    @endif
                </td>
                <td>{{ $servidor->ubicacion }}</td>
                <td>
                    {{ $servidor->elaboradoPor->username }} ({{ $servidor->created_at->diffForHumans() }})
                </td>
                <td>
                    @if(count($servidor->revisadoPor) > 0)
                        @foreach($servidor->revisadoPor as $revisor)
                        {{ $revisor->username }} ({{ $servidor->updated_at->diffForHumans() }})
                        @endforeach
                    @else
                    <a href="{{ route('servidor_municipal.edit', $servidor->id) }}" class="btn btn-sm btn-info" type="button">
                        <i class="fa fa-edit"></i> Revisar
                    </a>
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('servidor_municipal.show', $servidor->id) }}" class="btn btn-sm btn-danger" type="button">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ route('servidor_municipal.edit', $servidor->id) }}" class="btn btn-sm btn-warning" type="button">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('servidor_municipal.cambios', $servidor->id) }}" class="btn btn-sm btn-info" type="button">
                            <i class="fa fa-list"></i>
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
    <p>No se encontraron registros para mostrar, intenta <a href="{{ route('servidor_municipal.create') }}">agregar</a> un nuevo servidor municipal</p>
</div>
@endif
@endsection

@section('scripts')
@parent
<script>
    $('#servidores').addClass('active');
</script>
@endsection
