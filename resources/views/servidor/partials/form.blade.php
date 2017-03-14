<div class="form-group has-feedback{{ $errors->has('punto_atencion_id')?' has-error':'' }}">
    {!! Form::select('punto_atencion_id', $puntos, old('punto_atencion_id'), ['class' => 'form-control', 'placeholder' => 'Punto de Atención']) !!}
    <i class="fa fa-navicon form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('nombre')?' has-error':'' }}">
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre(s)']) !!}
    <i class="fa fa-file-text-o form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('apellido_paterno')?' has-error':'' }}">
    {!! Form::text('apellido_paterno', old('apellido_paterno'), ['class' => 'form-control', 'placeholder' => 'Apellido Paterno']) !!}
    <i class="fa fa-file-text-o form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('apellido_materno')?' has-error':'' }}">
    {!! Form::text('apellido_materno', old('apellido_materno'), ['class' => 'form-control', 'placeholder' => 'Apellido Materno']) !!}
    <i class="fa fa-file-text-o form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('genero')?' has-error':'' }}">
    {!! Form::select('genero', ['femenino' => 'Femenino', 'masculino' => 'Masculino'], old('genero'), ['class' => 'form-control', 'placeholder' => 'Género']) !!}
    <i class="fa fa-navicon form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('edad')?' has-error':'' }}">
    {!! Form::number('edad', old('edad'), ['class' => 'form-control', 'min' => '0', 'step' => '1', 'placeholder' => 'Edad']) !!}
    <i class="fa fa-hashtag form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('cargo')?' has-error':'' }}">
    {!! Form::text('cargo', old('cargo'), ['class' => 'form-control', 'placeholder' => 'Cargo']) !!}
    <i class="fa fa-file-text-o form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('puesto')?' has-error':'' }}">
    {!! Form::text('puesto', old('puesto'), ['class' => 'form-control', 'placeholder' => 'Puesto']) !!}
    <i class="fa fa-file-text-o form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('turno')?' has-error':'' }}">
    {!! Form::text('turno', old('turno'), ['class' => 'form-control', 'placeholder' => 'Turno']) !!}
    <i class="fa fa-file-text-o form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('antiguedad_años')?' has-error':'' }}">
    {!! Form::number('antiguedad_años', old('antiguedad_años'), ['class' => 'form-control', 'min' => '0', 'step' => '1', 'placeholder' => 'Años de Antiguedad']) !!}
    <i class="fa fa-hashtag form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('antiguedad_meses')?' has-error':'' }}">
    {!! Form::number('antiguedad_meses', old('antiguedad_meses'), ['class' => 'form-control', 'min' => '0', 'step' => '1', 'placeholder' => 'Meses de Antiguedad']) !!}
    <i class="fa fa-hashtag form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('servidor')?' has-error':'' }}">
    {!! Form::select('servidor', ['1ra_linea' => '1ra Línea', '2da_linea' => '2da Línea', 'contrato' => 'Contrato'], old('servidor'), ['class' => 'form-control', 'placeholder' => 'Tipo de Servidor']) !!}
    <i class="fa fa-navicon form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('ubicacion')?' has-error':'' }}">
    {!! Form::text('ubicacion', old('ubicacion'), ['class' => 'form-control', 'placeholder' => 'Ubicación']) !!}
    <i class="fa fa-file-test-o form-control-feedback"></i>
</div>
