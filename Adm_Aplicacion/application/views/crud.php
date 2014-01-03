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
                <div class="grid_2" id="head_nombre">Nombre</div>
                <div class="grid_3" id="head_email">Email</div>
                <div class="grid_2" id="head_registro">Fecha de registro</div>
                <div class="grid_2" id="head_eliminar">Eliminar</div>
                <div class="grid_2" id="head_editar">Editar</div>
            </div>
           <ul>
                <?php
                foreach($datos as $dato)
                {
                    ?>
                    <li>
                        Nombre : <?php echo $dato->nombre?>
                        <br />
                        Correo : <?php echo $dato->correo?>
                        <br />
                        Teléfono : <?php echo $dato->telefono?>
                        <br />
                        Fecha : <?php echo $dato->fechaNacimiento?>
                    </li>
                    <?php
                }
                ?>
           </ul>
            <div class="grid_12" id="agregar"><input type="button" value="Añadir" id="<?=$fila->id?>" class="agregar"></div>
        </div>
    </div>
   
</body>
</html>