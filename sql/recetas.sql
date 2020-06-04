CREATE TABLE recetas(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idautor INT,
    nombre VARCHAR(200),
    descripcion TEXT,
    ingredientes TEXT,
    preparacion TEXT
);