	<h1>Institucion</h1>
	<?= form_open('institucion/Crear') ?>
		<?php
					$nombre = array(
	                    'name' => 'nombre',
	                    'placeholder' => 'Ingrese Nombre de Institucion'
	                );
    	?>
        	<?= form_label('Nombre: ','nombre') ?>
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
			</select>

			<br><br>

	        Pais:
	        <select name = Pais>
				<?php
                foreach($datos as $dato):
                ?>
				<option name=<?= $dato->pk ?> value=<?= $dato->pk ?>> <?= $dato->nombre ?> </option>
				<?php
                endforeach;
                ?>
			</select>

			<br><br>

	        <?= form_submit('','Guardar')?>
	<?= form_close() ?>
	</body>
</html>