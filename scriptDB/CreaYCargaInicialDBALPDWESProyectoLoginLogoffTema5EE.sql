-- Creación de la base de datos en caso de que no exista --
CREATE DATABASE IF NOT EXISTS DBALPDWESLoginLogoffTema5;

-- Seleccionamos la base de datos para poder trabajar en ella --
USE DBALPDWESLoginLogoffTema5;

--Creamos, en caso de que no exista, la tabla y dentro cada campo con el tipo de valor correspondiente --
CREATE TABLE IF NOT EXISTS T01_Usuario(
    T01_CodUsuario VARCHAR(8) PRIMARY KEY,
    T01_Password VARCHAR(255),
    T01_DescUsuario VARCHAR(255),
    T01_NumConexiones INT DEFAULT 0,
    T01_FechaHoraUltimaConexion DATETIME,
    T01_Perfil VARCHAR(10) DEFAULT "usuario",
    T01_ImagenUsuario VARCHAR(255)
) engine=innodb;


--Creamos, en caso de que no exista, la tabla y dentro cada campo con el tipo de valor correspondiente --
CREATE TABLE IF NOT EXISTS T02_Departamento(
    T02_CodDepartamento VARCHAR(3) PRIMARY KEY,         /* Primary key: (varchar(3)) Codigo de cada departamento en mayúscula */
    T02_FechaCreacionDepartamento DATETIME,             /* (DateTime) Fecha de creación del departamento */
    T02_FechaBajaDepartamento DATETIME,                 /* (DateTime) Fecha de baja del departamento */
    T02_DescDepartamento VARCHAR(255),                  /* (varchar(255)) Descripción breve de cada departamento */
    T02_VolumenDeNegocio FLOAT                          /* (float) Volumen que ocupa cada departamento */
) engine = innodb;

-- Seleccionamos la base de datos en la que queremos trabajar --
USE DBALPDWESLoginLogoffTema5;


INSERT INTO T01_Usuario (T01_CodUsuario,T01_Password,T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_ImagenUsuario) VALUES
('alvaro',SHA2('alvaropaso', 256),'Alvaro Allen',NOW(),null),
('heraclio',SHA2('heracliopaso', 256),'Heraclio Borbujo',NOW(),null),
('gonzalo',SHA2('gonzalopaso', 256),'Gonzalo Junquera',NOW(),null),
('vero',SHA2('veropaso', 256),'Veronique Grue',NOW(),null),
('amor',SHA2('amorpaso', 256),'Amor Rodriguez',NOW(),null),
('admin',SHA2('adminpaso', 256),'Administrador',NOW(),null);

-- Insertamos en la tabla correspondiente cada uno de los valores por cada columna --
INSERT INTO T02_Departamento VALUES
('DWE',NOW(), NULL,'Departamento Web Extinta',50.4),
('DWA',NOW(), NULL,'Departamento Web Americano',48.3),
('IPE',NOW(), NULL,'Itinerario Profesional Empleabilidad',78.0),
('DIW',NOW(), NULL,'Diseño Interno Wow',150.21),
('DAW',NOW(), NULL,'Dinosaurio Animal Wolframio',65.7);