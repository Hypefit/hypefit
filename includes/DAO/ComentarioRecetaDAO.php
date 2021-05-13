<?php

namespace hypefit\DAO;

use hypefit\TO\ComentarioReceta;

class ComentarioRecetaDAO extends DAO {

    public function crearComentarioReceta(ComentarioReceta $u) {
        $texto = $this->limpiarString($u->getTexto());
        $idReceta = $this->limpiarString($u->getIdReceta());
        $idUsuario = $this->limpiarString($u->getIdUsuario());
        $valoracion = $this->limpiarString($u->getValoracion());

        $query = sprintf("INSERT into comentario_receta (idReceta, idUsuario, texto, valoracion) values
                ('%s','%s','%s','%s')", $idReceta, $idUsuario, $texto, $valoracion);
        return $this->insert($query);
    }

    public function getComentariosDeReceta($id): array {
        $idLimpio = $this->limpiarString($id);
        $query = "SELECT * from comentario_receta where idReceta = '$idLimpio' order by fecha";
        $filas = $this->select($query);

        $comentarios = array();
        foreach($filas as $fila) {
            $comentario = new ComentarioReceta();
            $comentario->setId($fila['id']);
            $comentario->setIdReceta($fila['idReceta']);
            $comentario->setIdUsuario($fila['idUsuario']);
            $comentario->setFecha($fila['fecha']);
            $comentario->setValoracion($fila['valoracion']);
            $comentario->setTexto($fila['texto']);

            array_push($comentarios, $comentario);
        }

        return $comentarios;
    }

    public function getValoracionMedia(array $ids) {
        $idsLimpios = array();
        foreach($ids as $id) {
            array_push($idsLimpios, $this->limpiarString($id));
        }
        $in = implode(',', $idsLimpios);
        $query = "SELECT avg(valoracion) from comentario_receta where idReceta in ($in)";
        $resultado = $this->select($query);

        return $resultado[0]['avg(valoracion)'];
    }
}