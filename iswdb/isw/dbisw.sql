
/* Drop Tables */

DROP TABLE IF EXISTS Formacion;
DROP TABLE IF EXISTS CargoAcademico;
DROP TABLE IF EXISTS LineasDeDesarrolloDocente;
DROP TABLE IF EXISTS Participacion;
DROP TABLE IF EXISTS Academico;
DROP TABLE IF EXISTS Carrera;
DROP TABLE IF EXISTS Departamento;
DROP TABLE IF EXISTS TrabajoActual;
DROP TABLE IF EXISTS Facultad;




/* Create Tables */

CREATE TABLE Formacion
(
	ID_Formacion bigint NOT NULL UNIQUE,
	NombreInstitucion varchar(250),
	tipoFormacion varchar(250),
	fechaInicio date,
	fechaFin date,
	ID_Academico int NOT NULL UNIQUE,
	titulo bytea,
	PRIMARY KEY (ID_Formacion)
) WITHOUT OIDS;


CREATE TABLE Academico
(
	ID_Academico serial NOT NULL UNIQUE,
	Nombre varchar(250) NOT NULL,
	ID_LineasDeDesarrolloDocente serial NOT NULL,
	Rut int NOT NULL UNIQUE,
	Telefono varchar(250),
	Funcion varchar(250),
	Jornada varchar(250),
	Region varchar(250),
	Ciudad varchar(250),
	Jerarquia varchar(250),
	fDeNacimiento date,
	ID_Departamento int NOT NULL,
	ID_TrabajoActual int NOT NULL UNIQUE,
	PRIMARY KEY (ID_Academico)
) WITHOUT OIDS;


CREATE TABLE Carrera
(
	ID_CARRERA int NOT NULL UNIQUE,
	Nombre varchar(250),
	Descripcion varchar(250),
	Jefe varchar(250),
	ID_Departamento int NOT NULL,
	PRIMARY KEY (ID_CARRERA)
) WITHOUT OIDS;


CREATE TABLE Departamento
(
	ID_Departamento serial NOT NULL,
	nombre varchar(250),
	ID_Facultad int NOT NULL UNIQUE,
	PRIMARY KEY (ID_Departamento)
) WITHOUT OIDS;


CREATE TABLE CargoAcademico
(
	ID_CargoAcademico serial NOT NULL UNIQUE,
	cargo varchar(250),
	institucion varchar(250),
	ID_Academico int NOT NULL UNIQUE
) WITHOUT OIDS;


CREATE TABLE TrabajoActual
(
	ID_TrabajoActual serial NOT NULL UNIQUE,
	cargo varchar(250) NOT NULL,
	direccion varchar(250) NOT NULL,
	ciudad varchar(250) NOT NULL,
	region varchar(250) NOT NULL,
	PRIMARY KEY (ID_TrabajoActual)
) WITHOUT OIDS;


CREATE TABLE Facultad
(
	ID_Facultad serial NOT NULL UNIQUE,
	Nombre varchar(250),
	direccion varchar(250),
	comuna varchar(250),
	telefono varchar(250),
	jefeDeFacultad varchar(250),
	PRIMARY KEY (ID_Facultad)
) WITHOUT OIDS;


CREATE TABLE Participacion
(
	ID_Participacion serial NOT NULL,
	Nombre varchar(250),
	institucion varchar(250),
	cargo varchar(250),
	ID_Academico int NOT NULL UNIQUE,
	PRIMARY KEY (ID_Participacion)
) WITHOUT OIDS;


CREATE TABLE LineasDeDesarrolloDocente
(
	ID_LineasDeDesarrolloDocente serial NOT NULL,
	Nombre varchar(250),
	ID_Academico int NOT NULL UNIQUE,
	PRIMARY KEY (ID_LineasDeDesarrolloDocente)
) WITHOUT OIDS;



/* Create Foreign Keys */

ALTER TABLE CargoAcademico
	ADD FOREIGN KEY (ID_Academico)
	REFERENCES Academico (ID_Academico)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE Formacion
	ADD FOREIGN KEY (ID_Academico)
	REFERENCES Academico (ID_Academico)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE LineasDeDesarrolloDocente
	ADD FOREIGN KEY (ID_Academico)
	REFERENCES Academico (ID_Academico)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE Participacion
	ADD FOREIGN KEY (ID_Academico)
	REFERENCES Academico (ID_Academico)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE Academico
	ADD FOREIGN KEY (ID_Departamento)
	REFERENCES Departamento (ID_Departamento)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE Carrera
	ADD FOREIGN KEY (ID_Departamento)
	REFERENCES Departamento (ID_Departamento)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE Academico
	ADD FOREIGN KEY (ID_TrabajoActual)
	REFERENCES TrabajoActual (ID_TrabajoActual)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE Departamento
	ADD FOREIGN KEY (ID_Facultad)
	REFERENCES Facultad (ID_Facultad)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;



