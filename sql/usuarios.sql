CREATE TABLE usuarios(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    apellidos VARCHAR(300),
    email VARCHAR(200) NOT NULL,
    foto VARCHAR(300),
    password VARCHAR(30),
    tipo VARCHAR(100)
);