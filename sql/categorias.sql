CREATE TABLE categorias(
    receta_id INT UNSIGNED,
    categorias_id INT UNSIGNED,
    FOREIGN KEY (receta_id) REFERENCES recetas(id),
    FOREIGN KEY (categorias_id) REFERENCES listacategorias(id)
);