-- Uso de la base de datos
USE bbdduniversitat;

-- Creación de la tabla PROFESOR
CREATE TABLE IF NOT EXISTS PROFESOR (
    DNI VARCHAR(9) PRIMARY KEY,
    Nombre VARCHAR(50),
    Apellidos VARCHAR(100),
    Direccion VARCHAR(100)
);

-- Creación de la tabla ASIGNATURA
CREATE TABLE IF NOT EXISTS ASIGNATURA (
    Codigo INT PRIMARY KEY,
    Nombre VARCHAR(100)
);

-- Creación de la tabla BICICLETA
CREATE TABLE IF NOT EXISTS BICICLETA (
    ID INT PRIMARY KEY
);

-- Creación de la tabla ESTUDIANTE
CREATE TABLE IF NOT EXISTS ESTUDIANTE (
    DNI VARCHAR(9) PRIMARY KEY,
    Nombre VARCHAR(50),
    Apellidos VARCHAR(100),
    Direccion VARCHAR(100),
    Telefono VARCHAR(15),
    FechaNacimiento DATE,
    NumExpediente INT,
    Edad INT,
    Email VARCHAR(100),
    IDBicicleta INT,
    FOREIGN KEY (IDBicicleta) REFERENCES BICICLETA(ID)
);

-- Creación de la tabla CLASE
CREATE TABLE IF NOT EXISTS CLASE (
    ID INT PRIMARY KEY
);

-- Creación de la tabla MATRICULA
CREATE TABLE IF NOT EXISTS MATRICULA (
    DNI_Estudiante VARCHAR(9),
    Codigo_Asignatura INT,
    Fecha DATE,
    FOREIGN KEY (DNI_Estudiante) REFERENCES ESTUDIANTE(DNI),
    FOREIGN KEY (Codigo_Asignatura) REFERENCES ASIGNATURA(Codigo)
);

-- Creación de la tabla PRESIDENTE
CREATE TABLE IF NOT EXISTS PRESIDENTE (
    DNI_Estudiante VARCHAR(9),
    ID_Clase INT,
    FOREIGN KEY (DNI_Estudiante) REFERENCES ESTUDIANTE(DNI),
    FOREIGN KEY (ID_Clase) REFERENCES CLASE(ID)
);

-- Inserción de 5 registros en PROFESOR
INSERT INTO PROFESOR (DNI, Nombre, Apellidos, Direccion) VALUES
('12345678A', 'Michael', 'Ragel Fernandez', 'Carrer les Salses, 23'),
('87654321B', 'Pere', 'Arnau', 'Carrer de la Gasela, 24'),
('98765432C', 'Sergio', 'Garrido Garrido', 'Rambla del Cazador, 8'),
('23456789D', 'Cristian', 'Espejo Flores', 'Carrer de La Isard, 39'),
('34567890E', 'Josefino', 'Guerrero Indio', 'Carrer Campoamor, 23');

-- Inserción de 5 registros en ASIGNATURA
INSERT INTO ASIGNATURA (Codigo, Nombre) VALUES
(1, 'Lenguaje de Marcas'),
(2, 'Cyberseguridad'),
(3, 'Sistemas Operativos'),
(4, 'Base de Datos'),
(5, 'Programacion');

-- Inserción de 5 registros en BICICLETA
INSERT INTO BICICLETA (ID) VALUES
(1),
(2),
(3),
(4),
(5);

-- Inserción de 5 registros en ESTUDIANTE
INSERT INTO ESTUDIANTE (DNI, Nombre, Apellidos, Direccion, Telefono, FechaNacimiento, NumExpediente, Edad, Email, IDBicicleta) VALUES
('15975369A', 'Gonzalo', 'Huancas', 'Carrer de la rectoria, 22', '607896541', '1991-12-26', 1, 32, 'gonzaloh24@uni.cat', 1),
('36974135B', 'Nitin', 'Sularia', 'Carrer de la Victoria, 20', '609632584', '1994-02-20', 2, 30, 'nitins24@uni.cat', 2),
('31593257C', 'Emanuel', 'Villaseca', 'Avenida Sandia, 30', '605893214', '2003-03-25', 3, 21, 'emanuelv24@uni.cat', 3),
('12478996D', 'Sergi', 'Miquel', 'Plaza del cabezon, 40', '607893215', '2001-08-30', 4, 22, 'sergim24@uni.cat', 4),
('45378635E', 'Naila', 'Paki', 'Paseo del los indios, 50', '6095135786', '1993-01-05', 5, 31, 'nailap24@uni.cat', 5);

-- Inserción de 5 registros en CLASE
INSERT INTO CLASE (ID) VALUES
(1),
(2),
(3),
(4),
(5);
