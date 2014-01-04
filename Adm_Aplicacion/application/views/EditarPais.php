<!DOCTYPE hmtl>
<html>
    <head>
        <title>Agregar Pais</title>
    </head>
    <body>
        <h1>Nuevo Pais</h1>
        <?php
            foreach($datos as $dato):
        ?>
        <?= form_open("paises/Update/".$dato->pk) ?>
        
        <?php
                $id = array(
                    'name'=>'id',
                    'value'=>$dato->pk
                );
                
                $nombre = array(
                    'name' => 'nombre',
                    'placeholder' => 'Ingrese el Nombre del Pais',
                    'value' => $dato->nombre
                );
                
                $codigo = array (
                    'name' => 'codigo',
                    'placeholder' => 'Ingrese codigo de Pais',
                    'value' => $dato->cod_num
                );
                
                $alfa2 = array(
                    'name' => 'alfa2',
                    'placeholder' => 'Ingrese Codigo Alfa 2',
                    'value' => $dato->alfa_dos
                );
                
                $alfa3 = array(
                    'name' => 'alfa3',
                    'placeholder' => 'Ingrese Codigo Alfa 3',
                    'value' => $dato->alfa_tres
                );
        ?>
        <?php
            endforeach;
        ?>
        <?= form_label('Nombre: ','nombre') ?>
        &nbsp <?= form_input($nombre) ?> <br><br>
        <?= form_label('Codigo: ','codigo') ?>
        &nbsp <?= form_input($codigo) ?> <br><br>
        <?= form_label('Codigo Alfa 2: ','alfa2') ?>
        &nbsp <?= form_input($alfa2) ?> <br><br>
        <?= form_label('Codigo Alfa 3: ','alfa3') ?>
        &nbsp <?= form_input($alfa3) ?> <br><br>
        <?= form_submit('','Actualizar')?>
        <br><br>
        <?= form_close() ?>
    </body>
</html>