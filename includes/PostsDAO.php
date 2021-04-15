<?php
require_once __DIR__ . '/DAO.php';
require_once __DIR__ . '/PostsDAO.php';
require_once __DIR__ . '/Post.php';


require_once __DIR__ . '/DAO.php';
require_once __DIR__ . '/Post.php';

class PostsDAO extends DAO {
    public function __construct() {
        parent::__construct();
    }

    public function crearPost(Post $u) {
        $query = sprintf("INSERT into posts (creador, titulo) values
                ('%s','%s')", $u->getIdCreador(), $u->getTitulo());
        return $this->insert($query);
    }

    public function getPost($id) {
        $idLimpio = $this->limpiarString($id);
        $query = "SELECT * from posts where id = '$idLimpio'";
        $fila = $this->select($query);

        return $this->crearObjetoPost($fila[0]);
    }

    public function getAllPosts() {
        $query = "SELECT * from posts";
        $filas = $this->select($query);

        $array_posts = array();
        foreach ($filas as $fila) {
            array_push($array_posts, $this->crearObjetoPost($fila));
        }

        return $array_posts;
    }

    private function crearObjetoPost($fila): Post {
        $post = new Post();
        $post->setId($fila['id']);
        $post->setIdCreador($fila['creador']);
        $post->setTitulo($fila['titulo']);

        return $post;
    }
}