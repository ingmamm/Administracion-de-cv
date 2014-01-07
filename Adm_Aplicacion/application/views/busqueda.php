<!DOCTYPE html>
<html lang="es">
<head>
    <title>
        <?php
            echo $titulo;
        ?>
    </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/960.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/estilos.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />
    
<body>
 
  <div class="container_12">
        <h1> <?php
                echo $titulo;
            ?>
        </h1>
        <div id = "Principal">
            <br>
            &nbsp Cuerpo Académico
            <br>
            &nbsp Unidad de Informática
            <br>
            <br>
            &nbsp A lo largo de su desarrollo, la Unidad de Informática y Computación, 
            &nbsp se ha nutrido de un grupo de profesionales, que con su experiencia y 
            &nbsp amor por la docencia, han enriquecido la formación de nuestros 
            &nbsp&nbspestudiantes.
            <br>
            <br>
            <br>
            <br>
            <br>        
        </div>
        <div id = "Busqueda">
            <br>
            <br>
            <div><input type="button" value="Jornada Completa"  class="eliminar"></div>
            <br>
            <br>
            <br>
            <div><input type="submit" value="Jornada Part Time"  class="eliminar"></div>
            <br>
            <br>
        </div>

    </div>
   
</body>
</html>