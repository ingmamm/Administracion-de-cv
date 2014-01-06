<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestion de Docentes</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/960.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/estilos.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />
    
<body>
 
  <div class="container_12">
        <h1>Eliminar datos</h1>
        <div class="grid_12">
            <div class="grid_12" id="head">
                <div class="grid_2" id="head_nombre">Pk</div>
                <div class="grid_2" id="head_nombre">Nombres</div>
                <div class="grid_3" id="head_email">Apellidos</div>
                <div class="grid_2" id="head_registro">RUT</div>
           </div>
                <?php
                foreach($datos as $dato):
                ?>
                <?= form_open('Docentes/Confirmar/'.$dato->pk) ?>
                        <div class="grid_12" id="body">
                            <div class="grid_2" id="pk<?=$dato->pk?>"><?=$dato->pk?></div>
                            <div class="grid_3" id="cod_num<?=$dato->pk?>"><?=$dato->nombres?></div>
                            <div class="grid_2" id="nombre<?=$dato->pk?>"><?=$dato->apellidos?></div>
                            <div class="grid_2" id="alfa_dos<?=$dato->pk?>"><?=$dato->rut?></div>
                            <br>
                            <div class="grid_2" id="eliminar"><input type="submit" value="Cancelar" name="boton" id="<?=$dato->pk?>" class="eliminar"></div>
                            <div class="grid_2" id="editar"><input type="submit" value="Aceptar" name="boton" id="<?=$dato->pk?>" class="editar"></div>
                        </div>
                <?= form_close() ?>
                <?php
                endforeach;
                ?>
            
            
            
        </div>
    </div>
   
</body>
</html>