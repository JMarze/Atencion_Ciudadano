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
            <i class="fa fa-edit"></i> Editar Usuario
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    @include('layouts.partials.validation')

    <div class="box-body">
        {!! Form::model($usuario, ['route' => ['usuario.update', $usuario->id], 'method' => 'put']) !!}

        @include('usuario.partials.form')

        <div class="form-group">
            {!! Form::checkbox('chkpassword', null, false, ['id' => 'chkpassword']) !!} Cambiar la contraseña del usuario
        </div>

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-save"></i> Editar Usuario
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

    $('#password').attr('disabled', 'disabled');
    $('#password_confirmation').attr('disabled', 'disabled');

    $(document).on('click', '#chkpassword', function(e){
        if($(this).is(':checked')){
            $('#password').removeAttr('disabled');
            $('#password_confirmation').removeAttr('disabled');
        }else{
            $('#password').attr('disabled', 'disabled');
            $('#password_confirmation').attr('disabled', 'disabled');
        }
    });
</script>
@endsection
