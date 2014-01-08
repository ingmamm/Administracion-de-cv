        <h1>Formacion</h1>
    <?php
        foreach($formaciones as $formacion):
    ?>
    <?= form_open("formacion/Update/".$formacion->pk."/".$formacion->institucion_fk."/".$formacion->grado_fk."/".$formacion->docente_fk) ?>

    <?php
        endforeach;
    ?>

        <?php
                foreach ($instituciones as $Institucion) {
                    $nombre = array(
                        'name' => 'nombre',
                        'placeholder' => 'Ingrese Nombre de Institucion',
                        'value' => $Institucion->nombre
                    );
                }

                foreach ($grados as $grad) {
                    $grado = array(
                        'name' => 'grado',
                        'placeholder' => 'Ingrese grado',
                        'value' => $grad->grado
                    );
                }

                foreach ($grados as $grad) {
                    $descripcion = array(
                        'name' => 'descripcion',
                        'placeholder' => 'Descripcion Grado',
                        'value' => $grad->descripcion 
                    );
                }

                foreach ($formaciones as $formacion) {
                    $titulo = array(
                        'name' => 'titulo',
                        'placeholder' => 'ingrese titulo',
                        'value' => $formacion->titulo
                    );
                }
        ?>


            <?= form_error('nombre') ?>
            <?= form_label('Nombre Institucion: ','nombre') ?>
            <?= form_input($nombre) ?> <br><br>


            Tipo:
            <select name = Tipo>
                <?php foreach ($tipo_int as $tipo_i): ?>
                <option name=<?= $tipo_i->pk ?> value=<?= $tipo_i->pk ?>>  <?= $tipo_i->tipo ?>  </option>
                <?php endforeach; ?>
                <?php
                foreach($Tipos as $tipo):
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

            <?= form_submit('','Actualizar') ?>
            

    </body>
</html>