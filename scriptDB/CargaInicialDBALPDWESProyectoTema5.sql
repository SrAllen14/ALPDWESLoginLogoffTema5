/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  alvaro.allper.1
 * Created: 30 oct. 2025
 */

-- Seleccionamos la base de datos en la que queremos trabajar --
USE DBALPDWESLoginLogoffTema5;


INSERT INTO T01_Usuario (T01_CodUsuario,T01_Password,T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_ImagenUsuario) VALUES
('useralva',SHA2('useralvapaso', 256),'Alvaro Allen',NOW(),null),
('useraaa',SHA2('useraaapaso', 256),'Mario Fernandez Lopez',NOW(),null),
('userbbb',SHA2('userbbbpaso', 256),'María Gonzalez Martin',NOW(),null);

-- Insertamos en la tabla correspondiente cada uno de los valores por cada columna --
INSERT INTO T02_Departamento VALUES
('DWE',NOW(), NULL,'Departamento Web Extinta',50.4),
('DWA',NOW(), NULL,'Departamento Web Americano',48.3),
('IPE',NOW(), NULL,'Itinerario Profesional Empleabilidad',78.0),
('DIW',NOW(), NULL,'Diseño Interno Wow',150.21),
('DAW',NOW(), NULL,'Dinosaurio Animal Wolframio',65.7);