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
            <i class="fa fa-plus"></i> Agregar Unidad Organizacional
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    @include('layouts.partials.validation')

    <div class="box-body">
        {!! Form::open(['route' => 'unidad.store', 'method' => 'post']) !!}

        @include('unidad.partials.form')

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Registrar Unidad Organizacional
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
