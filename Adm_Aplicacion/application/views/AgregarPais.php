<!DOCTYPE hmtl>
<html>
    <head>
        <title>Agregar Pais</title>
    </head>
    <body>
        <h1>Nuevo Pais</h1>
        <?= form_open("paises/Agregar") ?>
        <?php
                $nombre = array(
                    'name' => 'nombre',
                    'placeholder' => 'Ingrese el Nombre del Pais'
                );
                
                $codigo = array (
                    'name' => 'codigo',
                    'placeholder' => 'Ingrese codigo de Pais'
                );
                
                $alfa2 = array(
                    'name' => 'alfa2',
                    'placeholder' => 'Ingrese Codigo Alfa 2'
                );
                
                $alfa3 = array(
                    'name' => 'alfa3',
                    'placeholder' => 'Ingrese Codigo Alfa 3'
                );
        ?>
        <?= form_label('Nombre: ','nombre') ?>
        &nbsp <?= form_input($nombre) ?> <br><br>
        <?= form_label('Codigo: ','codigo') ?>
        &nbsp <?= form_input($codigo) ?> <br><br>
        <?= form_label('Codigo Alfa 2: ','alfa2') ?>
        &nbsp <?= form_input($alfa2) ?> <br><br>
        <?= form_label('Codigo Alfa 3: ','alfa3') ?>
        &nbsp <?= form_input($alfa3) ?> <br><br>
        <?= form_submit('','Agregar')?>
        <br><br>
        <?= form_close() ?>
    </body>
</html>