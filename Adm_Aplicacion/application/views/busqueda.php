<!DOCTYPE html>
<html lang="es">
<head>
    <title>
        Busqueda
    </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/960.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/estilos.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />
    
<body>
 
  <div class="container_12">
        <h1> Busqueda
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
            <br>
            <br>        
        </div>
        <div id = "Busqueda">
            <br>
            <br>
            <br>

            <?= form_open('Docentes/Buscar/') ?>

            <select  name = "jornada" style= "width:200px">
                <option name= jornada value="Jornada Completa">  Jornada Completa </option>
                <option name= jornada value="Media Jornada">  Media Jornada </option>
                <option name= jornada value="Por Horas">  Por Horas  </option>
            </select>
            <br>
            <br>
            <select style="width:200px">
                <option value="Carrera">Carrera</option>
                <option value="Asignatura">Asignatura</option>
                <option value="Grado Academico">Grado Academico</option>
                <option value="Lenguaje de Programación">Lenguaje de Programación</option>
            </select>
            <br>
            <br>
            <select style="width:200px">
                <option value="caso1">Depende del de arriba</option>
            </select>
            <br>
            <br>
            &nbsp <input type="submit" name= "boton" value="Buscar">
            <br>
            <br>

            <?= form_close() ?>
        </div>
        <?php
                foreach($datos as $dato):
                ?>
                <?= form_open('Docentes/option/'.$dato->pk) ?>

                        <div class="grid_12" id="body">
                            <div class="grid_2" id="pk<?=$dato->pk?>"><?=$dato->pk?></div>
                            <div class="grid_3" id="cod_num<?=$dato->pk?>"><?=$dato->nombres?></div>
                            <div class="grid_2" id="nombre<?=$dato->pk?>"><?=$dato->apellidos?></div>
                            <div class="grid_2" id="alfa_dos<?=$dato->pk?>"><?=$dato->rut?></div>
                            <br>
                            <div class="grid_2" id="eliminar"><input type="submit" name= "boton" value="Ver" id="<?=$dato->pk?>" class="eliminar"></div>
                            
                        </div>
                <?= form_close() ?>
                <?php
                endforeach;
                ?>

    </div>
   
</body>
</html>