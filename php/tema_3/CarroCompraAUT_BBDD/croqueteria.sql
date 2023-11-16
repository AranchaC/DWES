# Esquema de la base de datos croqueteria para poder importar con:
# sudo mysql < croqueteria.sql

DROP DATABASE IF EXISTS croqueteria;
CREATE DATABASE croqueteria;

DROP USER IF EXISTS administrador;
CREATE USER administrador IDENTIFIED BY 'administrador';

USE croqueteria;
GRANT ALL ON * TO administrador;

CREATE TABLE usuarios (
  usuario varchar(20) NOT NULL,
  pass varchar(70) DEFAULT NULL,
  PRIMARY KEY (usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO usuarios VALUES 
  ('admin','$2y$10$2/.G6E0U2aoxM8EF/1vlUu2BbiUY/BZhqaGIvU9eMQsdLlYdxF1dC'),
  ('arancha','$2y$10$RDJlk/wLwYkg4LEHFgOeSOZWGEjoxDdGGApmDi8ljmabVVNPLek9i'),
  ('eva','$2y$10$orwHE8cTZH4JGDX/n4B0BO5ZvokauYVqkVTRQfD9oA.2158.HHZc.'),
  ('rodri','$2y$10$2/.G6E0U2aoxM8EF/1vlUu2BbiUY/BZhqaGIvU9eMQsdLlYdxF1dC');
