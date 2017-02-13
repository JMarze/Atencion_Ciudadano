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
            <i class="fa fa-plus"></i> Agregar Ficha de Diagnóstico
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    @include('layouts.partials.validation')

    <div class="box-body">
        {!! Form::open(['route' => 'ficha_diagnostico.store', 'method' => 'post']) !!}

        @include('ficha.partials.form')

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Registrar Ficha de Diagnóstico
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
