<?php

class NoticiaModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=qatar_news;charset=utf8', 'root', '');
    }

    // Devuelve la lista de tareas completa.
    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM noticias");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $noticias;
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM noticias WHERE id = ?");
        $query->execute([$id]);
        $noticia = $query->fetch(PDO::FETCH_OBJ);
        
        return $noticia;
    }


    public function getByIdDesc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY id DESC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }    
    public function getByIdAsc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY id ASC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ);
        return $noticias;
    }

    public function getByFechaAsc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY fecha ASC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }
    public function getByFechaDesc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY fecha DESC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ);
        return $noticias;
    }

    public function getByTituloAsc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY titulo ASC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }
    public function getByTituloDesc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY titulo DESC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }

    public function getByDescripcionAsc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY descripcion ASC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }
    public function getByDescripcionDesc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY descripcion DESC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }

    public function getByCuerpoAsc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY cuerpo ASC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }
    public function getByCuerpoDesc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY cuerpo DESC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }

    public function getByCategoriaAsc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY id_categoria_fk ASC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ); 
        return $noticias;
    }
    public function getByCategoriaDesc() {
        $query = $this->db->prepare("SELECT * FROM noticias ORDER BY id_categoria_fk DESC");
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ);  
        return $noticias;
    }

    // Inserta una tarea en la base de datos.
    public function insert($titulo, $descripcion, $cuerpo, $fecha, $categoria) {
        $query = $this->db->prepare("INSERT INTO noticias (titulo, descripcion, cuerpo, fecha, id_categoria_fk) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$titulo, $descripcion, $cuerpo, $fecha, $categoria]);

        return $this->db->lastInsertId();
    }


    // Elimina una tarea dado su id.
    function delete($id) {
        $query = $this->db->prepare('DELETE FROM noticias WHERE id = ?');
        $query->execute([$id]);
    }
}
