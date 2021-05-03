<?php

namespace hypefit\DAO;

use hypefit\TO\Post;

class PostsDAO extends DAO {
    public function __construct() {
        parent::__construct();
    }

    public function crearPost(Post $u) {
        $creador = $this->limpiarString($u->getIdCreador());
        $titulo = $this->limpiarString($u->getTitulo());

        $query = sprintf("INSERT into posts (creador, titulo) values
                ('%s','%s')", $creador, $titulo);
        return $this->insert($query);
    }

    public function getPost($id): Post {
        $idLimpio = $this->limpiarString($id);
        $query = "SELECT * from posts where id = '$idLimpio'";
        $fila = $this->select($query);

        return $this->crearObjetoPost($fila[0]);
    }

    public function getAllPosts(): array {
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