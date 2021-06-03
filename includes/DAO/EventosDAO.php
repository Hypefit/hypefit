<?php

namespace hypefit\DAO;

use hypefit\TO\Evento;

class EventosDAO extends DAO {
    public function getAllEventos() {
        $query = "SELECT * FROM eventos";
        $resultado = $this->select($query);
        $eventos = array();
        foreach ($resultado as $fila) {
            $evento = new Evento();
            $evento->setId($fila['id']);
            $evento->setFechaInicio($fila['fechaInicio']);
            $evento->setFechaFin($fila['fechaFin']);
            $evento->setDescripcion($fila['descripcion']);
            array_push($eventos, $evento);
        }
        return $eventos;
    }

    public function getEventoPorId(int $id) {
        $id = $this->limpiarString($id);
        $query = "SELECT * FROM eventos where id = '$id'";
        $resultado = $this->select($query);
        $eventos = array();
        foreach ($resultado as $fila) {
            $evento = new Evento();
            $evento->setId($fila['id']);
            $evento->setFechaInicio($fila['fechaInicio']);
            $evento->setFechaFin($fila['fechaFin']);
            $evento->setDescripcion($fila['descripcion']);
            array_push($eventos, $evento);
        }
        return $eventos;
    }

    public function getIdCreadorEvento(int $id) {
        $id = $this->limpiarString($id);
        $query = "SELECT idCreador FROM eventos where id = '$id'";
        $resultado = $this->select($query);
        return $resultado[0]['idCreador'];
    }

    public function eliminarEvento(int $id) {
        $id = $this->limpiarString($id);
        $query = "DELETE FROM eventos where id = '$id'";
    }

    public function crearEvento(Evento $e) {
        $query = sprintf("INSERT into eventos (fechaInicio, fechaFin, titulo, descripcion, idCreador) VALUES ('%s', '%s','%s','%s','%s')", $this->limpiarString($e->getFechaInicio()),
            $this->limpiarString($e->getFechaFin()),
            $this->limpiarString($e->getTitulo()),
            $this->limpiarString($e->getDescripcion()),
            $this->limpiarString($e->getIdCreador()));
        return $this->insert($query);
    }

    public function actualizarEvento(Evento $e) {
        $query = sprintf("UPDATE eventos set fechaInicio = '%s', fechaFin = '%s', titulo = '%s', descripcion = '%s', idCreador = '%s' WHERE id = '%s'",$this->limpiarString($e->getFechaInicio()),
            $this->limpiarString($e->getFechaFin()),
            $this->limpiarString($e->getTitulo()),
            $this->limpiarString($e->getDescripcion()),
            $this->limpiarString($e->getIdCreador()),
            $this->limpiarString($e->getId()));
        return $this->insert($query);
    }
}