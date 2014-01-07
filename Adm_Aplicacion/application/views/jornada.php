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
        <div id ="Jornada_Principal">
            &nbsp <select>
                <option value="Carrera">Carrera</option>
                <option value="Asignatura">Asignatura</option>
                <option value="Grado Academico">Grado Academico</option>
                <option value="Lenguaje de Programación">Lenguaje de Programación</option>
                <option value="Proyectos Realizados">Proyectos Realizados</option>
                <option value="Lineas de Desarrollo Docente">Lineas de Desarrollo Docente</option>
            </select>
            <br>
            <br>
            &nbsp <select>
                <option value="Depende">Depende del de arriba</option>
            </select>
            <br>
            <br>
            &nbsp <button>Buscar</button>
            <br>
            <br>
            &nbsp <input type = "Text" name = "nombre">
            <br>

        </div>
    </div>
   
</body>
</html>