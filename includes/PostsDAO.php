<?php


class PostsDAO extends DAO {
    public function crearPost(Post $u) {
        $query = "INSERT into posts (creador, titulo) values
                (" . $u->getIdCreador() . "," . $u->getTitulo() . ")";
        return $this->insert($query);
    }

    public function getPost($id) {
        $query = "SELECT * from Rutinas where id = '$id'";
        $fila = $this->insert($query);

        return $this->crearObjetoPost($fila);
    }

    public function getAllPosts() {
        $query = "SELECT * from posts";
        $filas = $this->insert($query);

        $array_rutinas = array();
        foreach ($filas as $fila) {
            array_push($array_rutinas, $this->crearObjetoPost($fila));
        }

        return $array_rutinas;
    }

    private function crearObjetoPost($fila): Post {
        $post = new Post();
        $post->setId($fila['id']);
        $post->setIdCreador($fila['creador']);
        $post->setTitulo($fila['titulo']);

        return $post;
    }
}