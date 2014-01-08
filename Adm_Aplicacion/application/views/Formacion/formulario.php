		<h1>Institucion</h1>
	<?php
        foreach($docentes as $dato):
    ?>
    <?= form_open("formacion/nuevo/".$dato->pk) ?>

	<?php
        endforeach;
    ?>

		<?php
					$nombre = array(
	                    'name' => 'nombre',
	                    'placeholder' => 'Ingrese Nombre de Institucion'
	                );

	                $grado = array(
	                	'name' => 'grado',
	                	'placeholder' => 'Ingrese grado' 
	                );

	                $descripcion = array(
	                	'name' => 'descripcion',
	                	'placeholder' => 'Descripcion Grado' 
	                );

	                $titulo = array(
	                	'name' => 'titulo',
	                	'placeholder' => 'ingrese titulo' 
                	);
    	?>


        	<?= form_error('nombre') ?>
    		<?= form_label('Nombre Institucion: ','nombre') ?>
    		<?= form_input($nombre) ?> <br><br>


	        Tipo:
	        <select name = Tipo>
				<?php
                foreach($tipos as $tipo):
                ?>
				<option name=<?= $tipo->pk ?> value=<?= $tipo->pk ?>>  <?= $tipo->tipo ?>  </option>
				<?php
                endforeach;
                ?>
			</select><br><br>

	        Pais:
	        <select name = Pais>
				<?php
                foreach($paises as $pais):
                ?>
				<option name=<?= $pais->pk ?> value=<?= $pais->pk ?>> <?= $pais->nombre ?> </option>
				<?php
                endforeach;
                ?>
			</select> <br><br>

			<?= form_error('grado') ?>
    		<?= form_label('Grado: ','grado') ?>
    		<?= form_input($grado) ?> <br><br>

    		<?= form_error('descripcion') ?>
    		<?= form_label('Descripcion: ','descripcion') ?><br>
    		<?= form_textarea($descripcion) ?> <br><br>

    		<?= form_error('titulo') ?>
    		<?= form_label('Titulo: ','titulo') ?>
    		<?= form_input($titulo) ?> <br><br>

    		Fecha de Inicio:
		    <select name = diaI>
		    	<?php for ($diaI = 1; $diaI  <= 31; $diaI ++){
				echo "<option name= diaI value=$diaI>  $diaI  </option>";
				} ?>
			</select>
			<select name = mesI>
		    	<?php for ($mesI = 1; $mesI  <= 12; $mesI ++){
				echo "<option name= mesI value=$mesI>  $mesI  </option>";
				} ?>
			</select>
			<select name = anioI>
		    	<?php for ($anioI = 1914; $anioI  <= 2014; $anioI ++){
				echo "<option name= anioI value=$anioI>  $anioI  </option>";
				} ?>
			</select><br><br>

		    Fecha de Termino:
		    <select name = diaT>
		    	<?php for ($diaT = 1; $diaT  <= 31; $diaT ++){
				echo "<option name= diaT value=$diaT>  $diaT  </option>";
				} ?>
			</select>
			<select name = mesT>
		    	<?php for ($mesT = 1; $mesT  <= 12; $mesT ++){
				echo "<option name= mesT value=$mesT>  $mesT  </option>";
				} ?>
			</select>
			<select name = anioT>
		    	<?php for ($anioT = 1914; $anioT  <= 2014; $anioT ++){
				echo "<option name= anioT value=$anioT>  $anioT  </option>";
				} ?>
			</select><br><br>

			<?= form_submit('','Enviar') ?>
			

	</body>
</html>