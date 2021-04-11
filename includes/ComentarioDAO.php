<?php


class ComentarioDAO extends DAO {
    public function crearComentario(Comentario $u) {
        $query = "INSERT into comentarios_post (idPost, idUsuario, fecha, comentario) values
                (" . $u->getIdPost() . "," . $u->getIdUsuario() . "," . $u->getFecha() . "," . $u->getComentario() . ")";
        return $this->insert($query);
    }

    public function getComentariosDelPost($id) {
        $query = "SELECT * from comentarios_post where idPost = '$id' order by fecha";
        $filas = $this->insert($query);

        $comentarios = array();
        foreach($filas as $fila) {
            $comentario = new Comentario();
            $comentario->setId($fila['id']);
            $comentario->setIdPost($fila['idPost']);
            $comentario->setIdUsuario($fila['idUsuario']);
            $comentario->setFecha($fila['fecha']);
            $comentario->setComentario($fila['comentario']);

            array_push($comentarios, $comentario);
        }

        return $comentarios;
    }
}