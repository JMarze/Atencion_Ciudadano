@extends('layouts.app')

@section('htmlheader_title')
	Ficha Diagnóstico
@endsection

@section('contentheader_title')
	<i class="fa fa-id-card"></i> Ficha Diagnóstico
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-edit"></i> Revisar Ficha de Diagnóstico
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    @include('layouts.partials.validation')

    <div class="box-body">
        {!! Form::model($ficha, ['route' => ['ficha_diagnostico.update', $ficha->id], 'method' => 'put']) !!}

        @include('ficha.partials.form')

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-save"></i> Guardar Revisión de Ficha de Diagnóstico
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
