@extends('layouts.app')

@section('htmlheader_title')
	Unidades Organizacionales
@endsection

@section('contentheader_title')
	<i class="fa fa-cubes"></i> Unidades Organizacionales
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-trash"></i> Eliminar Unidad Organizacional
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        {!! Form::open(['route' => ['unidad.destroy', $unidad->id], 'method' => 'delete']) !!}

        <h4>¿Está seguro de eliminar la unidad organizacional <strong>{{ $unidad->nombre }}</strong>?</h4>

        <h5><i>* Esta operación es reversible con la ayuda del administrador de la base de datos, sin embargo no podrá utilizar el nombre de la unidad organizacional para agregar una nueva.</i></h5>

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-save"></i> Eliminar Unidad Organizacional
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
    $('#unidades').addClass('active');
</script>
@endsection
