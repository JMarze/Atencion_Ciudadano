@extends('layouts.app')

@section('htmlheader_title')
	Servidor Municipal
@endsection

@section('contentheader_title')
	<i class="fa fa-user-plus"></i> Servidor Municipal
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-edit"></i> Revisar Servidor Municipal
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    @include('layouts.partials.validation')

    <div class="box-body">
        {!! Form::model($servidor, ['route' => ['servidor_municipal.update', $servidor->id], 'method' => 'put']) !!}

        @include('servidor.partials.form')

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-save"></i> Guardar Revisión de Servidor Municipal
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
    $('#servidores').addClass('active');
</script>
@endsection
