@extends('layouts.app')

@section('htmlheader_title')
	Fichas Diagnóstico
@endsection

@section('contentheader_title')
	<i class="fa fa-id-card"></i> Fichas Diagnóstico
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-trash"></i> Eliminar Ficha de Diagnóstico
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        {!! Form::open(['route' => ['ficha_diagnostico.destroy', $ficha->id], 'method' => 'delete']) !!}

        <h4>¿Está seguro de eliminar la ficha de diagnóstico para el punto de atención <strong>{{ $ficha->puntoAtencion->nombre }}</strong>?</h4>

        <h5><i>* Esta operación es irreversible.</i></h5>

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-save"></i> Eliminar Ficha de Diagnóstico
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
    $('#fichas').addClass('active');
</script>
@endsection
