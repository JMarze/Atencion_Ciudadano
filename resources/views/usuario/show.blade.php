@extends('layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection

@section('contentheader_title')
	<i class="fa fa-user"></i> Usuarios
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-trash"></i> Eliminar Usuario
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">
        {!! Form::open(['route' => ['usuario.destroy', $usuario->id], 'method' => 'delete']) !!}

        <h4>¿Está seguro de eliminar al usuario <strong>{{ $usuario->name }}</strong> con privilegios de <strong>{{ $usuario->type }}</strong>?</h4>

        <h5><i>* Esta operación es irreversible</i></h5>

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-save"></i> Eliminar Usuario
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
    $('#usuarios').addClass('active');
</script>
@endsection
