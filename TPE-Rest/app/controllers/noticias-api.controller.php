<?php
require_once './app/models/noticias-api.model.php';
require_once './app/views/api.view.php';

class NoticiaApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new NoticiaModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getNoticias($params = null) {

        // Verifica la existencia de variables sort y order
        if(isset($_GET['order'])&& isset($_GET['sort'])){
            // Si la variable es ID ordena byId
            if($_GET['sort']=="id" || $_GET['sort']== "ID"){
                // Verifica si es ASC
                if($_GET['order']=="asc" || $_GET['order']=="ASC"){
                    $noticias = $this->model->getByIdAsc();
                    $this->view->response($noticias);
                }
                elseif($_GET['order']=="desc" || $_GET['order']=="DESC"){
                    $noticias = $this->model->getByIdDesc();
                    $this->view->response($noticias);
                }
            }

            // Si la variable es titulo ordena byFecha
            if($_GET['sort']=="fecha" || $_GET['sort']== "FECHA"){
                // Verifica si es ASC
                if($_GET['order']=="asc" || $_GET['order']=="ASC"){
                    $noticias = $this->model->getByFechaAsc();
                    $this->view->response($noticias);
                }
                elseif($_GET['order']=="desc" || $_GET['order']=="DESC"){
                    $noticias = $this->model->getByFechaDesc();
                    $this->view->response($noticias);
                }
            }

            // Si la variable es titulo ordena byTitulo
            if($_GET['sort']=="titulo" || $_GET['sort']== "TITULO"){
                // Verifica si es ASC
                if($_GET['order']=="asc" || $_GET['order']=="ASC"){
                    $noticias = $this->model->getByTituloAsc();
                    $this->view->response($noticias);
                }
                elseif($_GET['order']=="desc" || $_GET['order']=="DESC"){
                    $noticias = $this->model->getByTituloDesc();
                    $this->view->response($noticias);
                }
            }

            // Si la variable es titulo ordena byDescripcion
            if($_GET['sort']=="descripcion" || $_GET['sort']== "DESCRIPCION"){
                // Verifica si es ASC
                if($_GET['order']=="asc" || $_GET['order']=="ASC"){
                    $noticias = $this->model->getByDescripcionAsc();
                    $this->view->response($noticias);
                }
                elseif($_GET['order']=="desc" || $_GET['order']=="DESC"){
                    $noticias = $this->model->getByDescripcionDesc();
                    $this->view->response($noticias);
                }
            }

            // Si la variable es titulo ordena byCuerpo
            if($_GET['sort']=="cuerpo" || $_GET['sort']== "CUERPO"){
                // Verifica si es ASC
                if($_GET['order']=="asc" || $_GET['order']=="ASC"){
                    $noticias = $this->model->getByCuerpoAsc();
                    $this->view->response($noticias);
                }
                elseif($_GET['order']=="desc" || $_GET['order']=="DESC"){
                    $noticias = $this->model->getByCuerpoDesc();
                    $this->view->response($noticias);
                }
            }

            // Si la variable es titulo ordena byCategoria
            if($_GET['sort']=="categoria" || $_GET['sort']== "CATEGORIA"){
                // Verifica si es ASC
                if($_GET['order']=="asc" || $_GET['order']=="ASC"){
                    $noticias = $this->model->getByCategoriaAsc();
                    $this->view->response($noticias);
                }
                elseif($_GET['order']=="desc" || $_GET['order']=="DESC"){
                    $noticias = $this->model->getByCategoriaDesc();
                    $this->view->response($noticias);
                }
            }
        }
        // Si no tiene sort u order, muestra normal
        if(!isset($_GET['order']) && !isset($_GET['sort'])){
            $noticias = $this->model->getAll();
            $this->view->response($noticias);
        }
    }

    public function getNoticia($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $noticia = $this->model->get($id);

        // si no existe devuelvo 404
        if ($noticia)
            $this->view->response($noticia);
        else 
            $this->view->response("La noticia con el id=$id no existe", 404);
    }


    public function deleteNoticia($params = null) {
        $id = $params[':ID'];

        $noticia = $this->model->get($id);
        if ($noticia) {
            $this->model->delete($id);
            $this->view->response($noticia);
        } else 
            $this->view->response("La noticia con el id=$id no existe", 404);
    }

    public function insertNoticia($params = null) {
        $noticia = $this->getData();

        if (empty($noticia->titulo) || empty($noticia->descripcion) || empty($noticia->cuerpo) || empty($noticia->fecha) || empty($noticia->id_categoria_fk)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insert($noticia->titulo, $noticia->descripcion, $noticia->cuerpo, $noticia->fecha, $noticia->id_categoria_fk);
            $noticia = $this->model->get($id);
            $this->view->response($noticia, 201);
        }
    }

}