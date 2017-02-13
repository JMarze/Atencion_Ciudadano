<div class="form-group has-feedback{{ $errors->has('name')?' has-error':'' }}">
    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nombre Completo']) !!}
    <i class="fa fa-user form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('username')?' has-error':'' }}">
    {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) !!}
    <i class="fa fa-user-plus form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('email')?' has-error':'' }}">
    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Correo Electrónico']) !!}
    <i class="fa fa-envelope-open form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('type')?' has-error':'' }}">
    {!! Form::select('type', ['admin' => 'Administrador', 'tecnico' => 'Técnico', 'tecnico_web' => 'Técnico Web', 'jefe' => 'Jefe'], old('type'), ['class' => 'form-control', 'placeholder' => 'Nivel de Usuario']) !!}
    <i class="fa fa-user-secret form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('password')?' has-error':'' }}">
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'id' => 'password']) !!}
    <i class="fa fa-key form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('password_confirmation')?' has-error':'' }}">
    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmar Contraseña', 'id' => 'password_confirmation']) !!}
    <i class="fa fa-key form-control-feedback"></i>
</div>

<div class="form-group has-feedback{{ $errors->has('unidad_organizacional_id')?' has-error':'' }}">
    {!! Form::select('unidad_organizacional_id', $unidades, old('unidad_organizacional_id'), ['class' => 'form-control', 'placeholder' => 'Unidad Organizacional']) !!}
    <i class="fa fa-cubes form-control-feedback"></i>
</div>
