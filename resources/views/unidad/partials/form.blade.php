<div class="form-group has-feedback{{ $errors->has('nombre')?' has-error':'' }}">
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre Unidad Organizacional']) !!}
    <i class="fa fa-cubes form-control-feedback"></i>
</div>
