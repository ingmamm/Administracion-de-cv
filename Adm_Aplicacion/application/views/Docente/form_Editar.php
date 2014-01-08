	<h1>Editar Docente</h1>
    <?php
        foreach($datos as $dato):
    ?>
    <?= form_open("docentes/Update/".$dato->pk) ?>

    <?php
        $nombres = array(
            'name' => 'nombres',
            'placeholder' => 'Ingrese Nombres',
            'value' => $dato->nombres
        );
        
        $apellidos = array(
            'name' => 'apellidos',
            'placeholder' => 'Ingrese Apellidos',
            'value' => $dato->apellidos
        );
        
        $rut = array(
        	'name' => 'rut',
        	'placeholder' => 'Ingrese rut',
            'value' => $dato->rut
        );

        $direccion = array(
        	'name' => 'direccion',
        	'placeholder' => 'Ingrese Direccion',
            'value' => $dato->direccion
    	);

    	$telefono = array(
    		'name' => 'telefono',
    		'placeholder' => 'Ingrese N° telefono',
            'value' => $dato->telefono
    	);

    	$celular = array(
    		'name' => 'celular',
    		'placeholder' => 'Ingrese N° celular',
            'value' => $dato->celular
    	);

    	$email = array(
    		'name' => 'email',
    		'placeholder' => 'Ingrese email',
            'value' => $dato->email
    	);

    	$grado = array(
    		'name' => 'grado',
    		'placeholder' => 'Ingrese N° de grado',
            'value' => $dato->grado
    	);

    	$funcion = array(
    		'name' => 'funcion',
    		'placeholder' => 'Ingrese funcion',
            'value' => $dato->funcion
    	);

    	$eliminado = array(
    		'name' => 'eliminado',
    		'placeholder' => 'Ingrese N°',
            'value' => $dato->eliminado
    	);
	?>
	<?php
        endforeach;
    ?>

	<?= form_error('nombres') ?>
    <?= form_label('Nombre: ','nombres') ?>
    <?= form_input($nombres) ?> <br><br>
	
	<?= form_error('apellidos') ?>
    <?= form_label('Apellidos: ','apellidos') ?>
    <?= form_input($apellidos) ?> <br><br>

    <?= form_error('rut') ?>
    <?= form_label('RUT: ','rut') ?>
    <?= form_input($rut) ?> 
    Ej: 17.578.811-1  == 17578811 <br><br>

    Fecha de Nacimiento:
     <select name = dia>
    	<?php for ($dia = 1; $dia  <= 31; $dia ++){
		echo "<option name= dia value=$dia>  $dia  </option>";
		} ?>
	</select>
	<select name = mes>
    	<?php for ($mes = 1; $mes  <= 12; $mes ++){
		echo "<option name= mes value=$mes>  $mes  </option>";
		} ?>
	</select>
	<select name = anio>
    	<?php for ($anio = 1914; $anio  <= 2014; $anio ++){
		echo "<option name= anio value=$anio>  $anio  </option>";
		} ?>
	</select><br><br>

    Genero:
    <select name = genero>
		<option name= genero value=M>  Masculino  </option>
		<option name= genero value=F>  Femenino  </option>
	</select> <br><br>

    <?= form_error('direccion') ?>
    <?= form_label('Direccion: ','direccion') ?>
    <?= form_input($direccion) ?> <br><br>

    Comuna:
    <select name = comuna>
    	<?php foreach($comuna_fk as $com): ?>
			<option name=<?= $com->pk ?> value=<?= $com->pk ?>>  <?= $com->comuna ?>  </option>
		<?php endforeach; ?>
		<?php foreach($comunas as $comuna): ?>
			<option name=<?= $comuna->pk ?> value=<?= $comuna->pk ?>>  <?= $comuna->comuna ?>  </option>
		<?php endforeach; ?>
	</select> <br><br>

    <?= form_error('telefono') ?>
    <?= form_label('Telefono: ','telefono') ?>
    <?= form_input($telefono) ?> <br><br>

    <?= form_error('celular') ?>
    <?= form_label('Celular: ','celular') ?>
    <?= form_input($celular) ?> <br><br>

    <?= form_error('email') ?>
    <?= form_label('Email: ','email') ?>
    <?= form_input($email) ?> <br><br>

    Departamento:
    <select name = dpto>
    	<?php foreach($departamento_fk as $dept): ?>
			<option name=<?= $dept->pk ?> value=<?= $dept->pk ?>>  <?= $dept->departamento ?>  </option>
		<?php endforeach; ?>
		<?php foreach($departamentos as $dpto): ?>
			<option name=<?= $dpto->pk ?> value=<?= $dpto->pk ?>>  <?= $dpto->departamento ?>  </option>
		<?php endforeach; ?>
	</select> <br><br>

    Jerarquia:
    <select name = jerarquia>
            <?php foreach($datos as $dato): ?>
                <option name=<?= $dato->jerarquia ?> value=<?= $dato->jerarquia ?>>  <?= $dato->jerarquia ?>  </option>
            <?php endforeach; ?>
            <option name= jerarquia value=Titular>  Titular  </option>
            <option name= jerarquia value=Asociado>  Asociado  </option>
            <option name= jerarquia value=Asistente>  Asistente  </option>
            <option name= jerarquia value=Instructor>  Instructor  </option>
            <option name= jerarquia value=NoAsociado>  No Asociado  </option>
    </select> <br><br>

    Contrato:
    <select name = contrato>
            <?php foreach($datos as $dato): ?>
                <option name=<?= $dato->contrato ?> value=<?= $dato->contrato ?>>  <?= $dato->contrato ?>  </option>
            <?php endforeach; ?>
            <option name= contrato value=Planta>  Planta </option>
            <option name= contrato value=AContrata>  A contrata  </option>
            <option name= contrato value=Honorarios>  Honorarios  </option>
    </select> <br><br>

    Jornada:
    <select name = jornada>
            <?php foreach($datos as $dato): ?>
                <option name=<?= $dato->jornada ?> value=<?= $dato->jornada ?>>  <?= $dato->jornada ?>  </option>
            <?php endforeach; ?>
            <option name= jornada value="Jornada Completa">  Jornada Completa </option>
            <option name= jornada value="Media Jornada">  Media Jornada </option>
            <option name= jornada value="Por Horas">  Por Horas  </option>
    </select> <br><br>

    <?= form_error('grado') ?>
    <?= form_label('Grado: ','grado') ?>
    <?= form_input($grado) ?> <br><br>

    <?= form_error('funcion') ?>
    <?= form_label('Funcion: ','funcion') ?>
    <?= form_input($funcion) ?> <br><br>

    <?= form_error('eliminado') ?>
    <?= form_label('Eliminado: ','eliminado') ?>
    <?= form_input($eliminado) ?> <br><br>

    <?= form_submit('','Enviar') ?>

    <?= form_close() ?>
	</body>
</html>