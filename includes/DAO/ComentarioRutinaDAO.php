<?php

namespace hypefit\DAO;

use hypefit\TO\ComentarioRutina;

class ComentarioRutinaDAO extends DAO {

    public function crearComentarioRutina(ComentarioRutina $u) {
        $texto = $this->limpiarString($u->getTexto());
        $idRutina = $this->limpiarString($u->getIdRutina());
        $idUsuario = $this->limpiarString($u->getIdUsuario());
        $valoracion = $this->limpiarString($u->getValoracion());

        $query = sprintf("INSERT into comentarios_rutina (idRutina, idUsuario, texto, valoracion) values
                ('%s','%s','%s','%s')", $idRutina, $idUsuario, $texto, $valoracion);
        return $this->insert($query);
    }

    public function getComentariosDeRutina($id): array {
        $idLimpio = $this->limpiarString($id);
        $query = "SELECT * from comentarios_rutina where idRutina = '$idLimpio' order by fecha";
        $filas = $this->select($query);

        $comentarios = array();
        foreach($filas as $fila) {
            $comentario = new ComentarioRutina();
            $comentario->setId($fila['id']);
            $comentario->setIdRutina($fila['idRutina']);
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
        $query = "SELECT avg(valoracion) from comentarios_rutina where idRutina in ($in)";
        $resultado = $this->select($query);

        return $resultado[0]['avg(valoracion)'];
    }
}