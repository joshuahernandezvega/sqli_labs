-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS sqli_demo;
USE sqli_demo;

-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255),
    contrasena VARCHAR(255),
    profesion VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS datos_usuario (
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    codigo INT PRIMARY KEY,
    fecha_entrada DATE,
    area_de_trabajo VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS otros_usuario (
    codigo INT PRIMARY KEY,
    salario DECIMAL(10,2),
    dias_vacaciones INT
);

-- Insertar usuarios
INSERT INTO usuarios (usuario, contrasena, profesion) VALUES
('admin', 'admin123', 'Administrador'),
('joshua', '1234', 'Desarrollador'),
('pedro', 'qwerty', 'Pentester');

-- Crear tabla de productos
INSERT INTO datos_usuario (nombre, apellido, codigo, fecha_entrada, area_de_trabajo) VALUES
('Juan', 'Gomez', 1001, '2023-09-25', 'Desarrollo'),
('Maria', 'Lopez', 1002, '2023-09-26', 'Ventas'),
('Carlos', 'Rodriguez', 1003, '2023-09-27', 'Soporte');

INSERT INTO otros_usuario (codigo, salario, dias_vacaciones) VALUES
(1001, 45000.00, 21),
(1002, 52000.00, 25),
(1003, 48000.00, 20);
