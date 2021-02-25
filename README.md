# CRUD Básico PHP-PDO
Crud de imagenes en php.
------------

HERRAMIENTAS :
- Base de Datos: MySQL.
- Estilos: CSS3 y Bootstrap 4.
- Lenguaje : Lenguaje PHP.

## Arquitectura MVC
1. MODELO: representación de los datos que maneja el sistema, su lógica de negocio, y sus mecanismos de persistencia.
2. VISTA: Información que se envía al cliente y los mecanismos interacción con éste.
3. CONTROLADOR: intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y las transformaciones para adaptar los datos a las necesidades de cada uno.

## SCRIPT DE LA BASE DE DATOS
```sql
CREATE DATABASE reporte_vacunas DEFAULT CHARACTER SET utf8;
SET default_storage_engine = INNODB;


USE reporte_vacunas;


CREATE TABLE personal(
  idDNI int PRIMARY KEY,
  nombre varchar(50) not null,
  apellidoPaterno varchar(50) not NULL,
  apellidoMaterno varchar(50) not null,
  fecha date ,
  actividad varchar(50) not null,
  profesion varchar(50) not null,
  checkCovid char(2)    not NULL default 'nn',
  checkDiris char(2)    not NULL default 'nn',
  checkVacuna char(2)   not NULL default 'nn',
  tipo_brigada varchar(15) not NULL,
  observaciones VARCHAR(100) NOT NULL,
  estado TINYINT 
)ENGINE=InnoDB default charset=UTF8MB4;

#0 -> sin actualizacion
#1 -> actualizacion

CREATE TABLE brigada(
  id varchar(15) not null, #01 / 02 / 03
  nombre varchar(40) 
)ENGINE=InnoDB default charset=UTF8MB4;


#FORANEAS
#ALTER TABLE personal 
#ADD CONSTRAINT fk_id_brigada FOREIGN KEY (id_brigada)
#REFERENCES brigada(id)
#ON DELETE CASCADE
#ON UPDATE CASCADE;


#LLENDA DE DATOS
INSERT INTO brigada(id,nombre) VALUES('Brigada 01','10 a 11 am');
INSERT INTO brigada(id,nombre) VALUES('Brigada 01','11 a 12 am');
INSERT INTO brigada(id,nombre) VALUES('Brigada 02','10 a 11 am');
INSERT INTO brigada(id,nombre) VALUES('Brigada 03','10 a 11 am');

INSERT INTO personal(idDNI,nombre,apellidoPaterno,apellidoMaterno,fecha,actividad,profesion,checkCovid,checkDiris,checkVacuna,tipo_brigada,observaciones,estado) 
VALUES('12345678','nn','nn','nn','2021-02-11','AAA','AAA','SI','SI','SI','Brigada 01','nn',0);


#UPDATE DE DATOS
UPDATE personal 
    SET nombre = 'None' ,
        apellidoPaterno = 'None' ,
        apellidoMaterno = 'None',
        fecha = '2021-02-11',
        actividad = 'None',
        profesion = 'None',
        checkCovid = 'SI' ,
        checkDiris = 'SI' ,
        checkVacuna = 'NO',
        tipo_brigada  = 'BRIGARDA02',
        observaciones = 'None' WHERE idDNI = 12345678;

#SELECT
SELECT id , nombre FROM brigada;

SELECT * FROM personal WHERE estado=0 ORDER BY fecha DESC LIMIT 0 , 8;
SELECT * FROM personal WHERE estado=1 ORDER BY fecha DESC LIMIT 0 , 8;
SELECT COUNT(*) FROM personal WHERE estado=0;

SELECT * FROM personal;
SELECT * FROM personal WHERE idDNI = 45435;
```
