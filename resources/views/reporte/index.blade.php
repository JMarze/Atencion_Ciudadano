@extends('layouts.app')

@section('htmlheader_title')
	Reportes
@endsection

@section('contentheader_title')
	<i class="fa fa-file-o"></i> Reportes
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-file-o"></i> Generar Reporte Dinámico
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    @include('layouts.partials.validation')

    <div class="box-body">
        {!! Form::open(['route' => 'reporte.reporte', 'method' => 'post', 'id' => 'frm']) !!}

        <div class="form-group has-feedback{{ $errors->has('unidad_organizacional_id')?' has-error':'' }}">
            <label for="">Unidades Organizacionales</label>
            {!! Form::select('unidad_organizacional_id[]', $unidades, old('unidad_organizacional_id'), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            <i class="fa fa-navicon form-control-feedback"></i>
        </div>

        <div class="form-group has-feedback{{ $errors->has('punto_atencion_id')?' has-error':'' }}">
            <label for="">Puntos de Antención</label>
            {!! Form::select('punto_atencion_id[]', $puntos, old('punto_atencion_id'), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            <i class="fa fa-navicon form-control-feedback"></i>
        </div>

        <div class="form-group has-feedback{{ $errors->has('tipo')?' has-error':'' }}">
            <label for="">Tipos de Puntos de Atención</label>
            {!! Form::select('tipo[]', ['servicio' => 'Servicio', 'tramite' => 'Trámite'], old('tipo'), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            <i class="fa fa-navicon form-control-feedback"></i>
        </div>

        {!! Form::close() !!}
    </div><!-- /.box-body -->
</div><!-- /.box -->

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-file-o"></i> ¿Qué campos desesa incluir en el reporte?
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

    <div class="box-body">

        <div class="form-group has-feedback{{ $errors->has('unidad_organizacional_id')?' has-error':'' }}">
            <label for="">Campos</label>
            {!! Form::select('campos[]', ['tiene_senaletica' => 'Señalética', 'tiene_paneles' => 'Paneles', 'tiene_iluminacion' => 'Iluminación', 'tiene_limpieza_ciudadano' => 'Limpieza Ciudadano', 'tiene_limpieza_operadores' => 'Limpieza Operadores', 'tiene_asientos_publico' => 'Asientos Públicos', 'tiene_asientos_usuario' => 'Asientos Usuario', 'brinda_escritorio' => 'Escritorio', 'brinda_folletos' => 'Folletos', 'brinda_web' => 'Plataforma Virtal (Web)', 'brinda_ventanilla' => 'Ventanilla', 'brinda_fotocopias' => 'Fotocopias', 'brinda_telefono' => 'telefono', 'brinda_meson' => 'Mesón', 'brinda_tripticos' => 'Trípticos', 'brinda_verbal' => 'Verbal'], old('campos'), ['class' => 'form-control', 'multiple' => 'multiple', 'form' => 'frm']) !!}
            <i class="fa fa-navicon form-control-feedback"></i>
        </div>

        <div class="form-group has-feedback{{ $errors->has('tipo_archivo')?' has-error':'' }}">
            <label for="">Exportar a</label>
            {!! Form::select('tipo_archivo', ['excel' => 'Microsoft Excel', 'pdf' => 'PDF'], old('tipo_archivo'), ['class' => 'form-control', 'form' => 'frm']) !!}
            <i class="fa fa-navicon form-control-feedback"></i>
        </div>

        <div class="row text-right">
            <div class="col-md-3 col-md-offset-9">
                <button type="submit" class="btn btn-success" form="frm">
                    <i class="fa fa-file-o"></i> Generar Reporte
                </button>
            </div>
        </div>

    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('scripts')
@parent
<script>
    $('#reportes').addClass('active');

    $('select[multiple="multiple"]').select2();
</script>
@endsection
