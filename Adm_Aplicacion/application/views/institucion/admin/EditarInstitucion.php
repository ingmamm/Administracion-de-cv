<h1>Institucion</h1>
	<?php foreach ($datos as $dato): ?>
.
	
		<?= form_open('institucion/Update/'.$dato->pk) ?>
			<?php
						$nombre = array(
		                    'name' => 'nombre',
		                    'placeholder' => 'Ingrese Nombre de Institucion',
		                    'value' => $dato->nombre
		                );
	    	?>
	        	<?= form_label('Nombre: ','nombre') ?>
		        <?= form_input($nombre) ?> <br><br>
	<?php endforeach; ?>

	        Tipo:
	        <select name = Tipo>

	        	<?php
                foreach($tipo_inst as $tipo_I):
                ?>
				<option name=<?= $tipo_I->pk ?> value=<?= $tipo_I->pk ?>>  <?= $tipo_I->tipo ?>  </option>
				<?php
                endforeach;
                ?>

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
                foreach($pais_inst as $pais_I):
                ?>
				<option name=<?= $pais_I->pk ?> value=<?= $pais_I->pk ?>>  <?= $pais_I->nombre ?>  </option>
				<?php
                endforeach;
                ?>

				<?php
                foreach($paises as $pais):
                ?>
				<option name=<?= $pais->pk ?> value=<?= $pais->pk ?>> <?= $pais->nombre ?> </option>
				<?php
                endforeach;
                ?>
			</select>

			<br><br>

	        <?= form_submit('','Actualizar')?>
	<?= form_close() ?>
	</body>
</html>