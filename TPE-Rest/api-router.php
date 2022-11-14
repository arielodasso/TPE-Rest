<?php
require_once './libs/Router.php';
require_once './app/controllers/noticias-api.controller.php';
require_once './app/controllers/categorias-api.controller.php';
require_once './app/controllers/comentarios-api.controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('noticias', 'GET', 'NoticiaApiController', 'getNoticias');

$router->addRoute('noticias/:ID', 'GET', 'NoticiaApiController', 'getNoticia');
$router->addRoute('noticias/:ID', 'DELETE', 'NoticiaApiController', 'deleteNoticia');
$router->addRoute('noticias', 'POST', 'NoticiaApiController', 'insertNoticia'); 

$router->addRoute('categorias', 'GET', 'CategoriaApiController', 'getCategorias');
$router->addRoute('categorias/:ID', 'GET', 'CategoriaApiController', 'getCategoria');
$router->addRoute('categorias/:ID', 'DELETE', 'CategoriaApiController', 'deleteCategoria');
$router->addRoute('categorias', 'POST', 'CategoriaApiController', 'insertCategoria'); 

$router->addRoute('comentarios', 'GET', 'ComentarioApiController', 'getComentarios');
$router->addRoute('comentarios/:ID', 'GET', 'ComentarioApiController', 'getComentario');
$router->addRoute('comentarios', 'POST', 'ComentarioApiController', 'insertComentario'); 
$router->addRoute('comentarios/:ID', 'DELETE', 'ComentarioApiController', 'deleteComentario');

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);