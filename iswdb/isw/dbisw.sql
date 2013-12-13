
/* Drop Indexes */

DROP INDEX IF EXISTS cargos_academicos_cargo_fk_docente_fk_inicio_termino_key;
DROP INDEX IF EXISTS competencias_academicas_competencia_fk_docente_fk_key;
DROP INDEX IF EXISTS comunas_nombre_provincia_fk_key;
DROP INDEX IF EXISTS docentes_nombres_apellidos_rut_email_key;
DROP INDEX IF EXISTS instituciones_tipo_fk_nombre_pais_fk_key;
DROP INDEX IF EXISTS paises_cod_num_alfa_dos_alfa_tres_key;
DROP INDEX IF EXISTS provincias_nombre_region_fk_key;



/* Drop Tables */

DROP TABLE IF EXISTS public.cursos;
DROP TABLE IF EXISTS public.alumno;
DROP TABLE IF EXISTS public.cargos_academicos;
DROP TABLE IF EXISTS public.cargos;
DROP TABLE IF EXISTS public.competencias_academicas;
DROP TABLE IF EXISTS public.competencias;
DROP TABLE IF EXISTS public.formacion;
DROP TABLE IF EXISTS Participacion;
DROP TABLE IF EXISTS TrabajoActual;
DROP TABLE IF EXISTS LineasDeDesarrolloDocente;
DROP TABLE IF EXISTS public.docentes;
DROP TABLE IF EXISTS public.comunas;
DROP TABLE IF EXISTS public.escuelas;
DROP TABLE IF EXISTS public.departamentos;
DROP TABLE IF EXISTS public.facultades;
DROP TABLE IF EXISTS public.grados_academicos;
DROP TABLE IF EXISTS public.instituciones;
DROP TABLE IF EXISTS public.paises;
DROP TABLE IF EXISTS public.provincias;
DROP TABLE IF EXISTS public.regiones;
DROP TABLE IF EXISTS public.tipos_instituciones;



/* Drop Sequences */

DROP SEQUENCE IF EXISTS public.alumno_alumno_id_seq;
DROP SEQUENCE IF EXISTS public.cargos_academicos_pk_seq;
DROP SEQUENCE IF EXISTS public.cargos_pk_seq;
DROP SEQUENCE IF EXISTS public.competencias_academicas_pk_seq;
DROP SEQUENCE IF EXISTS public.competencias_pk_seq;
DROP SEQUENCE IF EXISTS public.comunas_pk_seq;
DROP SEQUENCE IF EXISTS public.cursos_curso_id_seq;
DROP SEQUENCE IF EXISTS public.departamentos_pk_seq;
DROP SEQUENCE IF EXISTS public.docentes_pk_seq;
DROP SEQUENCE IF EXISTS public.escuelas_pk_seq;
DROP SEQUENCE IF EXISTS public.facultades_pk_seq;
DROP SEQUENCE IF EXISTS public.formacion_pk_seq;
DROP SEQUENCE IF EXISTS public.grados_academicos_pk_seq;
DROP SEQUENCE IF EXISTS public.instituciones_pk_seq;
DROP SEQUENCE IF EXISTS public.paises_pk_seq;
DROP SEQUENCE IF EXISTS public.provincias_pk_seq;
DROP SEQUENCE IF EXISTS public.regiones_pk_seq;
DROP SEQUENCE IF EXISTS public.tipos_instituciones_pk_seq;




/* Create Tables */

CREATE TABLE public.alumno
(
	alumno_id serial NOT NULL,
	nombre varchar(100) NOT NULL,
	apellido varchar(100) NOT NULL,
	correo varchar(100) NOT NULL UNIQUE,
	CONSTRAINT alumno_pkey PRIMARY KEY (alumno_id)
) WITHOUT OIDS;


CREATE TABLE public.cargos
(
	pk serial NOT NULL,
	nombre varchar(255) NOT NULL UNIQUE,
	descripcion text,
	CONSTRAINT cargos_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.cargos_academicos
(
	pk bigserial NOT NULL,
	cargo_fk int NOT NULL,
	docente_fk bigint NOT NULL,
	inicio date NOT NULL,
	termino date NOT NULL,
	CONSTRAINT cargos_academicos_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.competencias
(
	pk serial NOT NULL,
	nombre varchar(255) NOT NULL UNIQUE,
	descripcion text,
	CONSTRAINT competencias_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.competencias_academicas
(
	pk bigserial NOT NULL,
	competencia_fk int NOT NULL,
	docente_fk bigint NOT NULL,
	CONSTRAINT competencias_academicas_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.comunas
(
	pk serial NOT NULL,
	nombre varchar(255) NOT NULL,
	provincia_fk int NOT NULL,
	CONSTRAINT comunas_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.cursos
(
	curso_id serial NOT NULL,
	curso varchar(100) NOT NULL,
	alumno_id int NOT NULL,
	CONSTRAINT cursos_pkey PRIMARY KEY (curso_id)
) WITHOUT OIDS;


CREATE TABLE public.departamentos
(
	pk serial NOT NULL,
	facultad_fk int NOT NULL,
	departamento varchar(255) NOT NULL UNIQUE,
	descripcion text,
	CONSTRAINT departamentos_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.docentes
(
	pk bigserial NOT NULL,
	nombres varchar(255) NOT NULL,
	apellidos varchar(255) NOT NULL,
	rut int NOT NULL UNIQUE,
	fecha_nacimiento date,
	genero char(1) DEFAULT '''m''::bpchar',
	direccion varchar(255) NOT NULL,
	comuna_fk int NOT NULL,
	telefono varchar(255),
	celular varchar(255),
	email varchar(255) NOT NULL,
	departamento_fk int NOT NULL,
	jerarquia varchar(255) NOT NULL,
	contrato varchar(255) NOT NULL,
	jornada varchar(255) NOT NULL,
	grado int DEFAULT 15 NOT NULL,
	funcion varchar(255) DEFAULT '''Académico''::character varying' NOT NULL,
	eliminado int DEFAULT 0 NOT NULL,
	CONSTRAINT docentes_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.escuelas
(
	pk serial NOT NULL,
	departamento_fk int NOT NULL,
	escuela varchar(255) NOT NULL UNIQUE,
	descripcion text,
	CONSTRAINT escuelas_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.facultades
(
	pk serial NOT NULL,
	facultad varchar(255) NOT NULL UNIQUE,
	descripcion text,
	CONSTRAINT facultades_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.formacion
(
	pk serial NOT NULL,
	institucion_fk int NOT NULL,
	grado_fk int NOT NULL,
	titulo varchar(255) NOT NULL,
	inicio date NOT NULL,
	termino date NOT NULL,
	docente_fk bigint NOT NULL,
	CONSTRAINT formacion_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.grados_academicos
(
	pk serial NOT NULL,
	grado varchar(255) NOT NULL UNIQUE,
	descripcion text,
	titulo bytea NOT NULL,
	CONSTRAINT grados_academicos_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.instituciones
(
	pk serial NOT NULL,
	tipo_fk int NOT NULL,
	nombre varchar(255) NOT NULL,
	pais_fk int NOT NULL,
	CONSTRAINT instituciones_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.paises
(
	pk serial NOT NULL,
	cod_num int NOT NULL,
	alfa_tres varchar(3) NOT NULL,
	alfa_dos varchar(2) NOT NULL,
	nombre varchar(255) NOT NULL UNIQUE,
	CONSTRAINT paises_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.provincias
(
	pk serial NOT NULL,
	nombre varchar(255) NOT NULL,
	region_fk int NOT NULL,
	CONSTRAINT provincias_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.regiones
(
	pk serial NOT NULL,
	nombre varchar(255) NOT NULL UNIQUE,
	corfo varchar(255) NOT NULL,
	codigo varchar(5) NOT NULL UNIQUE,
	numero int NOT NULL UNIQUE,
	CONSTRAINT regiones_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE public.tipos_instituciones
(
	pk serial NOT NULL,
	tipo varchar(255) NOT NULL UNIQUE,
	descripcion text,
	CONSTRAINT tipos_instituciones_pkey PRIMARY KEY (pk)
) WITHOUT OIDS;


CREATE TABLE Participacion
(
	ID_Participacion serial NOT NULL,
	Nombre varchar(250),
	institucion varchar(250),
	cargo varchar(250),
	ID_Academico serial NOT NULL UNIQUE,
	pk bigint NOT NULL,
	PRIMARY KEY (ID_Participacion)
) WITHOUT OIDS;


CREATE TABLE TrabajoActual
(
	ID_TrabajoActual serial NOT NULL UNIQUE,
	cargo varchar(250) NOT NULL,
	direccion varchar(250) NOT NULL,
	ciudad varchar(250) NOT NULL,
	region varchar(250) NOT NULL,
	pk bigint NOT NULL,
	PRIMARY KEY (ID_TrabajoActual)
) WITHOUT OIDS;


CREATE TABLE LineasDeDesarrolloDocente
(
	ID_LineasDeDesarrolloDocente serial NOT NULL,
	Nombre varchar(250),
	ID_Academico serial NOT NULL UNIQUE,
	pk bigint NOT NULL,
	PRIMARY KEY (ID_LineasDeDesarrolloDocente)
) WITHOUT OIDS;



/* Create Foreign Keys */

ALTER TABLE public.cursos
	ADD CONSTRAINT cursos_alumno_id_fkey FOREIGN KEY (alumno_id)
	REFERENCES public.alumno (alumno_id)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.cargos_academicos
	ADD CONSTRAINT cargos_academicos_cargo_fk_fkey FOREIGN KEY (cargo_fk)
	REFERENCES public.cargos (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.competencias_academicas
	ADD CONSTRAINT competencias_academicas_competencia_fk_fkey FOREIGN KEY (competencia_fk)
	REFERENCES public.competencias (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.docentes
	ADD CONSTRAINT docentes_comuna_fk_fkey FOREIGN KEY (comuna_fk)
	REFERENCES public.comunas (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.docentes
	ADD CONSTRAINT docentes_departamento_fk_fkey FOREIGN KEY (departamento_fk)
	REFERENCES public.departamentos (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.escuelas
	ADD CONSTRAINT escuelas_departamento_fk_fkey FOREIGN KEY (departamento_fk)
	REFERENCES public.departamentos (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.cargos_academicos
	ADD CONSTRAINT cargos_academicos_docente_fk_fkey FOREIGN KEY (docente_fk)
	REFERENCES public.docentes (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.competencias_academicas
	ADD CONSTRAINT competencias_academicas_docente_fk_fkey FOREIGN KEY (docente_fk)
	REFERENCES public.docentes (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.formacion
	ADD CONSTRAINT formacion_docente_fk_fkey FOREIGN KEY (docente_fk)
	REFERENCES public.docentes (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE Participacion
	ADD FOREIGN KEY (pk)
	REFERENCES public.docentes (pk)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE TrabajoActual
	ADD FOREIGN KEY (pk)
	REFERENCES public.docentes (pk)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE LineasDeDesarrolloDocente
	ADD FOREIGN KEY (pk)
	REFERENCES public.docentes (pk)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE public.departamentos
	ADD CONSTRAINT departamentos_facultad_fk_fkey FOREIGN KEY (facultad_fk)
	REFERENCES public.facultades (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.formacion
	ADD CONSTRAINT formacion_grado_fk_fkey FOREIGN KEY (grado_fk)
	REFERENCES public.grados_academicos (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.formacion
	ADD CONSTRAINT formacion_institucion_fk_fkey FOREIGN KEY (institucion_fk)
	REFERENCES public.instituciones (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.instituciones
	ADD CONSTRAINT instituciones_pais_fk_fkey FOREIGN KEY (pais_fk)
	REFERENCES public.paises (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.comunas
	ADD CONSTRAINT comunas_provincia_fk_fkey FOREIGN KEY (provincia_fk)
	REFERENCES public.provincias (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.provincias
	ADD CONSTRAINT provincias_region_fk_fkey FOREIGN KEY (region_fk)
	REFERENCES public.regiones (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;


ALTER TABLE public.instituciones
	ADD CONSTRAINT instituciones_tipo_fk_fkey FOREIGN KEY (tipo_fk)
	REFERENCES public.tipos_instituciones (pk)
	ON UPDATE CASCADE
	ON DELETE CASCADE
;



/* Create Indexes */

CREATE UNIQUE INDEX cargos_academicos_cargo_fk_docente_fk_inicio_termino_key ON public.cargos_academicos USING BTREE (cargo_fk, docente_fk, inicio, termino);
CREATE UNIQUE INDEX competencias_academicas_competencia_fk_docente_fk_key ON public.competencias_academicas USING BTREE (competencia_fk, docente_fk);
CREATE UNIQUE INDEX comunas_nombre_provincia_fk_key ON public.comunas USING BTREE (nombre, provincia_fk);
CREATE UNIQUE INDEX docentes_nombres_apellidos_rut_email_key ON public.docentes USING BTREE (nombres, apellidos, rut, email);
CREATE UNIQUE INDEX instituciones_tipo_fk_nombre_pais_fk_key ON public.instituciones USING BTREE (tipo_fk, nombre, pais_fk);
CREATE UNIQUE INDEX paises_cod_num_alfa_dos_alfa_tres_key ON public.paises USING BTREE (cod_num, alfa_dos, alfa_tres);
CREATE UNIQUE INDEX provincias_nombre_region_fk_key ON public.provincias USING BTREE (nombre, region_fk);



