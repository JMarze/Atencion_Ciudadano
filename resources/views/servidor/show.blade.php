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
            <i class="fa fa-trash"></i> Eliminar Servidor Municipal
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        {!! Form::open(['route' => ['servidor_municipal.destroy', $servidor->id], 'method' => 'delete']) !!}

        <h4>¿Está seguro de eliminar al servidor municipal <i>{{ $servidor->apellido_paterno }} {{ $servidor->apellido_materno }} {{ $servidor->nombre }}</i> para el punto de atención <strong>{{ $servidor->puntoAtencion->nombre }}</strong>?</h4>

        <h5><i>* Esta operación es irreversible.</i></h5>

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-save"></i> Eliminar Servidor Municipal
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
