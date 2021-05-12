<?php

namespace hypefit\DAO;

use hypefit\TO\ComentarioRutina;

class ComentarioRutinaDAO extends DAO {

    public function crearComentarioRutina(ComentarioRutina $u) {
        $texto = $this->limpiarString($u->getTexto());
        $idRutina = $this->limpiarString($u->getIdPost());
        $idUsuario = $this->limpiarString($u->getIdUsuario());
        $valoracion = $this->limpiarString($u->getValoracion());

        $query = sprintf("INSERT into comentario_rutina (idRutina, idUsuario, texto, valoracion) values
                ('%s','%s','%s','%s')", $idRutina, $idUsuario, $texto, $valoracion);
        return $this->insert($query);
    }

    public function getComentariosDeRutina($id): array {
        $idLimpio = $this->limpiarString($id);
        $query = "SELECT * from comentario_rutina where idRutina = '$idLimpio' order by fecha";
        $filas = $this->select($query);

        $comentarios = array();
        foreach($filas as $fila) {
            $comentario = new ComentarioRutina();
            $comentario->setId($fila['id']);
            $comentario->setIdRutina($fila['idRutina']);
            $comentario->setIdUsuario($fila['idUsuario']);
            $comentario->setFecha($fila['fecha']);
            $comentario->setValoracion($fila['valoracion']);
            $comentario->setComentario($fila['comentario']);

            array_push($comentarios, $comentario);
        }

        return $comentarios;
    }
}