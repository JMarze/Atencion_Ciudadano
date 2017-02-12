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
            <i class="fa fa-edit"></i> Editar Unidad Organizacional
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    @include('layouts.partials.validation')

    <div class="box-body">
        {!! Form::model($unidad, ['route' => ['unidad.update', $unidad->id], 'method' => 'put']) !!}

        @include('unidad.partials.form')

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-save"></i> Editar Unidad Organizacional
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
