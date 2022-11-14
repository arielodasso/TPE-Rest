<?php

class ComentarioModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=qatar_news;charset=utf8', 'root', '');
    }

    // Devuelve la lista de tareas completa.
    public function getAll() {

        $query = $this->db->prepare("SELECT * FROM comentarios");
        $query->execute();
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $comentarios;
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ?");
        $query->execute([$id]);
        $comentario = $query->fetch(PDO::FETCH_OBJ);
        
        return $comentario;
    }

    // Inserta una tarea en la base de datos.
    public function insert($comentario) {
        $query = $this->db->prepare("INSERT INTO comentarios (comentario) VALUES (?)");
        $query->execute([$comentario]);

        return $this->db->lastInsertId();
    }


    // Elimina una tarea dado su id.
    function delete($id) {
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
        $query->execute([$id]);
    }
}
