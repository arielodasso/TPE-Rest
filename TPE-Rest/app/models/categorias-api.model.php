<?php

class CategoriaModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=qatar_news;charset=utf8', 'root', '');
    }

    // Devuelve la lista de tareas completa.
    public function getAll() {

        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $categorias;
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
        $query->execute([$id]);
        $categoria = $query->fetch(PDO::FETCH_OBJ);
        
        return $categoria;
    }

    // Inserta una tarea en la base de datos.
    public function insert($categoria) {
        $query = $this->db->prepare("INSERT INTO categorias (categoria) VALUES (?)");
        $query->execute([$categoria]);

        return $this->db->lastInsertId();
    }


    // Elimina una tarea dado su id.
    function delete($id) {
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);
    }
}
