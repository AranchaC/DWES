# Esquema de la base de datos frutas para poder importar con:
# sudo mysql < frutas.sql

DROP DATABASE frutas;
CREATE DATABASE frutas;
DROP USER IF EXISTS frutero;
CREATE USER frutero IDENTIFIED BY 'frutero';
USE frutas;
GRANT ALL ON * TO frutero;
CREATE TABLE stock (
  fruta varchar(20) NOT NULL,
  stock int DEFAULT NULL,
  PRIMARY KEY (fruta)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO stock VALUES ('fresas',10),('kiwi',30),('platano',20);
