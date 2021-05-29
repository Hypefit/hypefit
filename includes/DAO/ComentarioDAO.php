<?php

namespace hypefit\DAO;

use hypefit\TO\Comentario;

class ComentarioDAO extends DAO {

    public function crearComentario(Comentario $u) {
        $comentario = $this->limpiarString($u->getComentario());
        $idPost = $this->limpiarString($u->getIdPost());
        $idUsuario = $this->limpiarString($u->getIdUsuario());
        $idComentarioPadre = $this->limpiarString($u->getidComentarioPadre());


        $query = sprintf("INSERT into comentarios_post (idPost, idUsuario, comentario, idComentarioPadre) values
                ('%s','%s','%s','%s')", $idPost, $idUsuario, $comentario, $idComentarioPadre);
        return $this->insert($query);
    }

    public function getComentariosDelPost($id): array {
        $idLimpio = $this->limpiarString($id);
        $query = "SELECT * from comentarios_post where idPost = '$idLimpio' order by fecha";
        $filas = $this->select($query);

        $comentarios = array();
        foreach($filas as $fila) {
            $comentario = new Comentario();
            $comentario->setId($fila['id']);
            $comentario->setIdPost($fila['idPost']);
            $comentario->setIdUsuario($fila['idUsuario']);
            $comentario->setFecha($fila['fecha']);
            $comentario->setComentario($fila['comentario']);
            $comentario->setidComentarioPadre($fila['idComentarioPadre']);


            array_push($comentarios, $comentario);
        }

        return $comentarios;
    }
}