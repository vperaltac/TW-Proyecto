CREATE TABLE fotos(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idreceta INT UNSIGNED,
    fichero VARCHAR(200),
    FOREIGN KEY (idreceta) REFERENCES recetas(id)
);