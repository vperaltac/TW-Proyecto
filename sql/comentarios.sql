CREATE TABLE comentarios(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idreceta INT UNSIGNED,
    idusuario INT UNSIGNED,
    comentario TEXT,
    fecha DATETIME(0),
    FOREIGN KEY (idreceta) REFERENCES recetas(id),
    FOREIGN KEY (idusuario) REFERENCES usuarios(id)
);