@extends('layouts.app')

@section('htmlheader_title')
	Puntos de Atención
@endsection

@section('contentheader_title')
	<i class="fa fa-cube"></i> Puntos de Atención
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-trash"></i> Eliminar Punto de Atención
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        {!! Form::open(['route' => ['punto_atencion.destroy', $punto->id], 'method' => 'delete']) !!}

        <h4>¿Está seguro de eliminar el punto de atención <strong>{{ $punto->nombre }}</strong> para la unidad organizacional <strong>{{ $punto->unidadOrganizacional->nombre }}</strong>?</h4>

        <h5><i>* Esta operación es reversible con la ayuda del administrador de la base de datos, sin embargo no podrá utilizar el nombre del punto de atención para agregar uno nuevo.</i></h5>

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-save"></i> Eliminar Punto de Atención
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('scripts')
@parent
<script>
    $('#puntos').addClass('active');
</script>
@endsection
