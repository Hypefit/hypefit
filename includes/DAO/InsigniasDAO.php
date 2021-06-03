<?php

namespace hypefit\DAO;

use hypefit\TO\Insignia;

class InsigniasDAO extends DAO {
    public function buscarInsigniaPorNombre(string $nombreInsignia) {
        $query = sprintf("SELECT * FROM insignias WHERE titulo = '%s'", $this->limpiarString($nombreInsignia));
        $resultado = $this->select($query);
        if (!empty($resultado)) {
            $insignia = new Insignia();
            $fila = $resultado[0];
            $insignia->setId($fila['id']);
            $insignia->setRutaImagen($fila['rutaImagen']);
            $insignia->setTitulo($fila['titulo']);
            $insignia->setDescripcion($fila['descripcion']);
            return $insignia;
        }
        else {
            return false;
        }
    }

    public function buscarInsigniaPorId(string $idInsignia) {
        $query = sprintf("SELECT * FROM insignias WHERE id = '%s'", $this->limpiarString($idInsignia));
        $resultado = $this->select($query);
        if (!empty($resultado)) {
            $insignia = new Insignia();
            $fila = $resultado[0];
            $insignia->setId($fila['id']);
            $insignia->setRutaImagen($fila['rutaImagen']);
            $insignia->setTitulo($fila['titulo']);
            $insignia->setDescripcion($fila['descripcion']);
            return $insignia;
        }
        else {
            return false;
        }
    }
}