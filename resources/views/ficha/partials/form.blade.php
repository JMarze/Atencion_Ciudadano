<table class="table">
    <tr>
        <th colspan="3" style="width:30%;">Nombre de la Plataforma / Punto de Atención:</th>
        <td colspan="7" style="width:30%;">
            <div class="form-group has-feedback{{ $errors->has('punto_atencion_id')?' has-error':'' }}">
                {!! Form::select('punto_atencion_id', $puntos, old('punto_atencion_id'), ['class' => 'form-control', 'placeholder' => 'Seleccione un Punto de Atención']) !!}
                <i class="fa fa-cube form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="1" rowspan="2" style="width:10%;">Ubicación:</th>
        <th colspan="1" style="width:10%;">Zona:</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('zona')?' has-error':'' }}">
                {!! Form::text('zona', old('zona'), ['class' => 'form-control']) !!}
                <i class="fa fa-address-card form-control-feedback"></i>
            </div>
        </td>
        <th colspan="1" style="width:10%;">Calle:</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('calle')?' has-error':'' }}">
                {!! Form::text('calle', old('calle'), ['class' => 'form-control']) !!}
                <i class="fa fa-address-card form-control-feedback"></i>
            </div>
        </td>
        <th colspan="1" style="width:10%;">Número:</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('numero')?' has-error':'' }}">
                {!! Form::text('numero', old('numero'), ['class' => 'form-control']) !!}
                <i class="fa fa-address-card form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="1" style="width:10%;">Nombre del Edificio:</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('nombre_edificio')?' has-error':'' }}">
                {!! Form::text('nombre_edificio', old('nombre_edificio'), ['class' => 'form-control']) !!}
                <i class="fa fa-address-card form-control-feedback"></i>
            </div>
        </td>
        <th colspan="1" style="width:10%;">Piso:</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('piso')?' has-error':'' }}">
                {!! Form::text('piso', old('piso'), ['class' => 'form-control']) !!}
                <i class="fa fa-address-card form-control-feedback"></i>
            </div>
        </td>
        <th colspan="1" style="width:10%;">Referencia:</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('referencia')?' has-error':'' }}">
                {!! Form::text('referencia', old('referencia'), ['class' => 'form-control']) !!}
                <i class="fa fa-address-card form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="2" style="width:20%;">Cantidad de Funcionarios:</th>
        <th colspan="1" style="width:10%;">1ra. Línea</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('funcionarios_linea_1')?' has-error':'' }}">
                {!! Form::number('funcionarios_linea_1', old('funcionarios_linea_1'), ['class' => 'form-control', 'min' => '0', 'step' => '1']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <th colspan="1" style="width:10%;">2da. Línea</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('funcionarios_linea_2')?' has-error':'' }}">
                {!! Form::number('funcionarios_linea_2', old('funcionarios_linea_2'), ['class' => 'form-control', 'min' => '0', 'step' => '1']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <td colspan="2" style="width:20%;"></td>
    </tr>

    <tr>
        <th colspan="2" style="width:20%;">Horario de Atención:</th>
        <th colspan="1" style="width:10%;">Lunes - Viernes</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('lunes_viernes_de')?' has-error':'' }}">
                {!! Form::input('time', 'lunes_viernes_de', null, ['class' => 'form-control']) !!}
            </div>
            <br/>
            <div class="form-group has-feedback{{ $errors->has('lunes_viernes_a')?' has-error':'' }}">
                {!! Form::input('time', 'lunes_viernes_a', null, ['class' => 'form-control']) !!}
            </div>
        </td>
        <th colspan="1" style="width:10%;">Sábados</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('sabado_de')?' has-error':'' }}">
                {!! Form::input('time', 'sabado_de', null, ['class' => 'form-control']) !!}
            </div>
            <br/>
            <div class="form-group has-feedback{{ $errors->has('sabado_a')?' has-error':'' }}">
                {!! Form::input('time', 'sabado_a', null, ['class' => 'form-control']) !!}
            </div>
        </td>
        <th colspan="1" style="width:10%;">Otros</th>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('otro')?' has-error':'' }}">
                {!! Form::textarea('otro', old('otro'), ['class' => 'form-control', 'rows' => '5']) !!}
                <i class="fa fa-file-text form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="3" style="width:30%;">La Plataforma / Punto de Atención tiene</th>
        <th>TIENE</th>
        <th colspan="2" style="width:20%;">CANTIDAD</th>
        <th colspan="4" style="width:40%;">ESTADO ACTUAL</th>
    </tr>

    <tr>
        <th colspan="3" style="width:30%;">Señaletica externa de acceso a la plataforma / punto de atención</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('tiene_senaletica')?' has-error':'' }}">
                {!! Form::select('tiene_senaletica', [true => 'Si', false => 'No'], old('tiene_senaletica'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('cantidad_senaletica')?' has-error':'' }}">
                {!! Form::number('cantidad_senaletica', old('cantidad_senaletica'), ['class' => 'form-control', 'min' => '0', 'step' => '1']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <td colspan="4" style="width:40%;">
            <div class="form-group has-feedback{{ $errors->has('estado_senaletica')?' has-error':'' }}">
                {!! Form::text('estado_senaletica', old('estado_senaletica'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="3" style="width:30%;">Paneles de Información</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('tiene_paneles')?' has-error':'' }}">
                {!! Form::select('tiene_paneles', [true => 'Si', false => 'No'], old('tiene_paneles'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('cantidad_paneles')?' has-error':'' }}">
                {!! Form::number('cantidad_paneles', old('cantidad_paneles'), ['class' => 'form-control', 'min' => '0', 'step' => '1']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <td colspan="4" style="width:40%;">
            <div class="form-group has-feedback{{ $errors->has('estado_paneles')?' has-error':'' }}">
                {!! Form::text('estado_paneles', old('estado_paneles'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="3" style="width:30%;">Iluminación</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('tiene_iluminacion')?' has-error':'' }}">
                {!! Form::select('tiene_iluminacion', [true => 'Si', false => 'No'], old('tiene_iluminacion'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('cantidad_iluminacion')?' has-error':'' }}">
                {!! Form::number('cantidad_iluminacion', old('cantidad_iluminacion'), ['class' => 'form-control', 'min' => '0', 'step' => '1']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <td colspan="4" style="width:40%;">
            <div class="form-group has-feedback{{ $errors->has('estado_iluminacion')?' has-error':'' }}">
                {!! Form::text('estado_iluminacion', old('estado_iluminacion'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="3" style="width:30%;">Limpieza (Basureros para el ciudadano)</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('tiene_limpieza_ciudadano')?' has-error':'' }}">
                {!! Form::select('tiene_limpieza_ciudadano', [true => 'Si', false => 'No'], old('tiene_limpieza_ciudadano'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('cantidad_limpieza_ciudadano')?' has-error':'' }}">
                {!! Form::number('cantidad_limpieza_ciudadano', old('cantidad_limpieza_ciudadano'), ['class' => 'form-control', 'min' => '0', 'step' => '1']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <td colspan="4" style="width:40%;">
            <div class="form-group has-feedback{{ $errors->has('estado_limpieza_ciudadano')?' has-error':'' }}">
                {!! Form::text('estado_limpieza_ciudadano', old('estado_limpieza_ciudadano'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="3" style="width:30%;">Limpieza (Basureros para los operadores)</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('tiene_limpieza_operadores')?' has-error':'' }}">
                {!! Form::select('tiene_limpieza_operadores', [true => 'Si', false => 'No'], old('tiene_limpieza_operadores'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('cantidad_limpieza_operadores')?' has-error':'' }}">
                {!! Form::number('cantidad_limpieza_operadores', old('cantidad_limpieza_operadores'), ['class' => 'form-control', 'min' => '0', 'step' => '1']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <td colspan="4" style="width:40%;">
            <div class="form-group has-feedback{{ $errors->has('estado_limpieza_operadores')?' has-error':'' }}">
                {!! Form::text('estado_limpieza_operadores', old('estado_limpieza_operadores'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="3" style="width:30%;">Asientos para la atención del servidor público</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('tiene_asientos_publico')?' has-error':'' }}">
                {!! Form::select('tiene_asientos_publico', [true => 'Si', false => 'No'], old('tiene_asientos_publico'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('cantidad_parados_asientos_publico')?' has-error':'' }}">
                {!! Form::number('cantidad_parados_asientos_publico', old('cantidad_parados_asientos_publico'), ['class' => 'form-control', 'min' => '0', 'step' => '1', 'placeholder' => 'Parados']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>

            <div class="form-group has-feedback{{ $errors->has('cantidad_sentados_asientos_publico')?' has-error':'' }}">
                {!! Form::number('cantidad_sentados_asientos_publico', old('cantidad_sentados_asientos_publico'), ['class' => 'form-control', 'min' => '0', 'step' => '1', 'placeholder' => 'Sentados']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <td colspan="4" style="width:40%;">
            <div class="form-group has-feedback{{ $errors->has('estado_asientos_publico')?' has-error':'' }}">
                {!! Form::text('estado_asientos_publico', old('estado_asientos_publico'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="3" style="width:30%;">Asientos para el usuario</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('tiene_asientos_usuario')?' has-error':'' }}">
                {!! Form::select('tiene_asientos_usuario', [true => 'Si', false => 'No'], old('tiene_asientos_usuario'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <td colspan="2" style="width:20%;">
            <div class="form-group has-feedback{{ $errors->has('cantidad_parados_asientos_usuario')?' has-error':'' }}">
                {!! Form::number('cantidad_parados_asientos_usuario', old('cantidad_parados_asientos_usuario'), ['class' => 'form-control', 'min' => '0', 'step' => '1', 'placeholder' => 'Parados']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>

            <div class="form-group has-feedback{{ $errors->has('cantidad_sentados_asientos_usuario')?' has-error':'' }}">
                {!! Form::number('cantidad_sentados_asientos_usuario', old('cantidad_sentados_asientos_usuario'), ['class' => 'form-control', 'min' => '0', 'step' => '1', 'placeholder' => 'Sentados']) !!}
                <i class="fa fa-hashtag form-control-feedback"></i>
            </div>
        </td>
        <td colspan="4" style="width:40%;">
            <div class="form-group has-feedback{{ $errors->has('estado_asientos_usuario')?' has-error':'' }}">
                {!! Form::text('estado_asientos_usuario', old('estado_asientos_usuario'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="4" style="width:40%;">Tipo de Plataforma / puntos de atención:</th>
        <th>Escritorio</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_escritorio')?' has-error':'' }}">
                {!! Form::select('brinda_escritorio', [true => 'Si', false => 'No'], old('brinda_escritorio'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <th>Ventanilla</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_ventanilla')?' has-error':'' }}">
                {!! Form::select('brinda_ventanilla', [true => 'Si', false => 'No'], old('brinda_ventanilla'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <th>Mesón</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_meson')?' has-error':'' }}">
                {!! Form::select('brinda_meson', [true => 'Si', false => 'No'], old('brinda_meson'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="4" rowspan="2" style="width:40%;">Brindan Información al ciudadano por medio de:</th>
        <th>Folletos</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_folletos')?' has-error':'' }}">
                {!! Form::select('brinda_folletos', [true => 'Si', false => 'No'], old('brinda_folletos'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <th>Fotocopias</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_fotocopias')?' has-error':'' }}">
                {!! Form::select('brinda_fotocopias', [true => 'Si', false => 'No'], old('brinda_fotocopias'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <th>Trípticos</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_tripticos')?' has-error':'' }}">
                {!! Form::select('brinda_tripticos', [true => 'Si', false => 'No'], old('brinda_tripticos'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th>Plataforma Virtual (WEB)</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_web')?' has-error':'' }}">
                {!! Form::select('brinda_web', [true => 'Si', false => 'No'], old('brinda_web'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <th>Plataforma Telefónica</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_telefono')?' has-error':'' }}">
                {!! Form::select('brinda_telefono', [true => 'Si', false => 'No'], old('brinda_telefono'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
        <th>Verbal</th>
        <td>
            <div class="form-group has-feedback{{ $errors->has('brinda_verbal')?' has-error':'' }}">
                {!! Form::select('brinda_verbal', [true => 'Si', false => 'No'], old('brinda_verbal'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr>
        <th colspan="4" style="width:40%;">Requerimientos para mejorar la Plataforma / Punto de Atención al ciudadano</th>
        <td colspan="6" style="width:60%;">
            <div class="form-group has-feedback{{ $errors->has('requerimientos')?' has-error':'' }}">
                {!! Form::text('requerimientos', old('requerimientos'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr class="plataforma" style="display:none;">
        <th colspan="4" style="width:40%;">La Plataforma de Atención tiene:</th>
        <th colspan="6" style="width:60%;">TIENE</th>
    </tr>

    <tr class="plataforma" style="display:none;">
        <th colspan="4" style="width:40%;">Facilitador ciudadano (información)</th>
        <td colspan="6" style="width:60%;">
            <div class="form-group has-feedback{{ $errors->has('tiene_facilitador_usuario')?' has-error':'' }}">
                {!! Form::select('tiene_facilitador_usuario', [true => 'Si', false => 'No'], old('tiene_facilitador_usuario'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr class="plataforma" style="display:none;">
        <th colspan="4" style="width:40%;">Sistema de fichas</th>
        <td colspan="6" style="width:60%;">
            <div class="form-group has-feedback{{ $errors->has('tiene_sistema_fichas')?' has-error':'' }}">
                {!! Form::select('tiene_sistema_fichas', [true => 'Si', false => 'No'], old('tiene_sistema_fichas'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr class="plataforma" style="display:none;">
        <th colspan="4" style="width:40%;">Asientos de espera</th>
        <td colspan="6" style="width:60%;">
            <div class="form-group has-feedback{{ $errors->has('tiene_asientos_espera')?' has-error':'' }}">
                {!! Form::select('tiene_asientos_espera', [true => 'Si', false => 'No'], old('tiene_asientos_espera'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr class="plataforma" style="display:none;">
        <th colspan="4" style="width:40%;">Pantallas de llamado de turnos</th>
        <td colspan="6" style="width:60%;">
            <div class="form-group has-feedback{{ $errors->has('tiene_pantallas_turno')?' has-error':'' }}">
                {!! Form::select('tiene_pantallas_turno', [true => 'Si', false => 'No'], old('tiene_pantallas_turno'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr class="plataforma" style="display:none;">
        <th colspan="4" style="width:40%;">Rampas de acceso a la plataforma</th>
        <td colspan="6" style="width:60%;">
            <div class="form-group has-feedback{{ $errors->has('tiene_rampa_acceso')?' has-error':'' }}">
                {!! Form::select('tiene_rampa_acceso', [true => 'Si', false => 'No'], old('tiene_rampa_acceso'), ['class' => 'form-control']) !!}
                <i class="fa fa-check-square form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr class="plataforma" style="display:none;">
        <th colspan="4" style="width:40%;">¿Cómo brinda los servicios con atención preferencial en su plataforma? (Adulto Mayor, Mujeres embarazadas o con niños, etc.)</th>
        <td colspan="6" style="width:60%;">
            <div class="form-group has-feedback{{ $errors->has('atencion_preferencial')?' has-error':'' }}">
                {!! Form::text('atencion_preferencial', old('atencion_preferencial'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>

    <tr class="plataforma" style="display:none;">
        <th colspan="4" style="width:40%;">Observaciones</th>
        <td colspan="6" style="width:60%;">
            <div class="form-group has-feedback{{ $errors->has('observaciones')?' has-error':'' }}">
                {!! Form::text('observaciones', old('observaciones'), ['class' => 'form-control']) !!}
                <i class="fa fa-file form-control-feedback"></i>
            </div>
        </td>
    </tr>
</table>
