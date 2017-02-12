<div class="form-group has-feedback{{ $errors->has('nombre')?' has-error':'' }}">
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre Punto de Atención']) !!}
    <i class="fa fa-cube form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('unidad_organizacional_id')?' has-error':'' }}">
    {!! Form::select('unidad_organizacional_id', $unidades, old('unidad_organizacional_id'), ['class' => 'form-control', 'placeholder' => 'Unidad Organizacional']) !!}
    <i class="fa fa-cubes form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('tipo')?' has-error':'' }}">
    {!! Form::select('tipo', ['servicio' => 'Servicio', 'tramite' => 'Trámite'], old('tipo'), ['class' => 'form-control', 'placeholder' => 'Tipo']) !!}
    <i class="fa fa-navicon form-control-feedback"></i>
</div>
