<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crud con codeigniter</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/960.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/estilos.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />
    
<body>
 
  <div class="container_12">
        <h1>Crud con codeigniter</h1>
        <div class="grid_12">
            <div class="grid_12" id="head">
                <div class="grid_2" id="head_nombre">Pk</div>
                <div class="grid_2" id="head_nombre">Codigo Numerico</div>
                <div class="grid_3" id="head_email">Nombre</div>
                <div class="grid_2" id="head_registro">Codigo alfa-2</div>
                <div class="grid_2" id="head_eliminar">Oodigo alfa-3</div>
                <div class="grid_2" id="head_eliminar">Opciones</div>
           </div>
                <?php
                foreach($datos as $dato):
                ?>
                        <div class="grid_12" id="body">
                            <div class="grid_2" id="pk<?=$dato->pk?>"><?=$dato->pk?></div>
                            <div class="grid_3" id="cod_num<?=$dato->pk?>"><?=$dato->cod_num?></div>
                            <div class="grid_2" id="nombre<?=$dato->pk?>"><?=$dato->nombre?></div>
                            <div class="grid_2" id="alfa_dos<?=$dato->pk?>"><?=$dato->alfa_dos?></div>
                            <div class="grid_2" id="alfa_tres<?=$dato->pk?>"><?=$dato->alfa_tres?></div>
                            <div class="grid_2" id="eliminar"><input type="button" value="Eliminar" id="<?=$dato->pk?>" class="eliminar"></div>
                            <div class="grid_2" id="editar"><input type="button" value="Editar" id="<?=$dato->pk?>" class="editar"></div>
                        </div>
                <?php
                endforeach;
                ?>
            
            <div class="grid_12" id="agregar"><input type="button" value="Añadir" id="<?=$dato->pk?>" class="agregar" onclick="location.href='welcome'"></div>
            
        </div>
    </div>
   
</body>
</html>