<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $titulo;?></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/960.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/estilos.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />
    
<body>
 
  <div class="container_12">
        <h1><?php echo $titulo;?></h1>
        <div class="grid_12">
            <div class="grid_12" id="head">
                <div class="grid_2" id="head_nombre">Pk</div>
                <div class="grid_2" id="head_email">Provincia</div>
                <div class="grid_2" id="head_registro">Region</div>
                <div class="grid_2" id="head_eliminar">Eliminar</div>
                <div class="grid_2" id="head_editar">Editar</div>
           </div>
                <?php
                foreach($datos as $dato):
                ?>
                        <div class="grid_12" id="body">
                            <div class="grid_2" id="pk<?=$dato->pk?>"><?=$dato->pk?></div>
                            <div class="grid_2" id="email"><?=$dato->provincia?></div>
                            <div class="grid_2" id="alfa_dos<?=$dato->pk?>"><?=$dato->region?></div>
                            <div class="grid_2" id="eliminar"><input type="button" value="Eliminar" id="<?=$dato->pk?>" class="eliminar"></div>
                            <div class="grid_2" id="editar"><input type="button" value="Editar" id="<?=$dato->pk?>" class="editar"></div>
                        </div>
                <?php
                endforeach;
                ?>
          
            <div class="grid_12" id="agregar"><input type="button" value="Añadir" id="<?=$dato->pk?>" class="agregar"></div>
        </div>
    </div>
   
</body>
</html>