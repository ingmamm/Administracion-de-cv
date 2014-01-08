	<h1>Informacion Docente</h1>

    <?= form_open('docentes/option') ?>
    <?php foreach ($datos as $dato): ?>
    
    Nombres: <?= $dato->nombres ?> <br><br>
    Apellidos: <?= $dato->apellidos ?> <br><br>
    RUT: <?= $dato->rut ?> <br><br>
    Fecha de Nacimiento: <?= $dato->fecha_nacimiento ?> <br><br>
    Genero: <?= $dato->genero ?> <br><br>
    Direccion: <?= $dato->direccion ?> <br><br>
    Comuna: <?= $dato->comuna_fk ?> <br><br>
    Telefono: <?= $dato->telefono ?> <br><br>
    Celular: <?= $dato->celular ?> <br><br>
    email: <?= $dato->email ?> <br><br>
    Departamento: <?= $dato->departamento_fk ?> <br><br>
    Jerarquia: <?= $dato->jerarquia ?> <br><br>
    Contrato: <?= $dato->contrato ?> <br><br>
    Jornada: <?= $dato->jornada ?> <br><br>
    Grado: <?= $dato->grado ?> <br><br>
    Funcion: <?= $dato->funcion ?> <br><br>
    Eliminado: <?= $dato->eliminado ?> <br><br>

    <?php endforeach; ?>

    <?= form_submit('boton',"Volver") ?>
    <?= form_close() ?>
	</body>
</html>