CREATE TABLE valoraciones(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idreceta INT UNSIGNED,
    idusuario INT UNSIGNED,
    valoracion TINYINT,
    FOREIGN KEY (idreceta) REFERENCES recetas(id),
    FOREIGN KEY (idusuario) REFERENCES usuarios(id)
);