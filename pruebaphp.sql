CREATE DATABASE PRUEBA_PHP

CREATE TABLE USUARIOS(
    ID INT PRIMARY KEY AUTO_INCREMENT,
	Email VARCHAR(100),
    Nombre VARCHAR(100),
    Apellido VARCHAR(100),
    Estado SMALLINT
)

INSERT INTO USUARIOS (Email, Nombre, Apellido, Estado) VALUES ('juan234@loquesea.com', 'Juan', '', 1), ('juan324@loquesea.com', 'Juan', 'Perz', 2), ('juan15@loquesea.com', 'Juan', 'Perez', 3))

