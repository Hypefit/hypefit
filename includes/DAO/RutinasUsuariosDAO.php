<?php

namespace hypefit\DAO;

use hypefit\TO\RutinasUsuarios;

class RutinasUsuariosDAO extends DAO {
    public function buscarRutinaPorUsuario(int $idUsuario, int $idRutina) {
        $query = sprintf("SELECT * FROM rutinas_usuarios WHERE idRutina = '%s' AND idUsuario = '%s'", $this->limpiarString($idRutina), $this->limpiarString($idUsuario));
        $resultado = $this->select($query);
        if (!empty($resultado)) {
            $to = new RutinasUsuarios();
            $fila = $resultado[0];
            $to->setIdRutina($fila['idRutina']);
            $to->setIdUsuario($fila['idUsuario']);
            $to->setCompletada($fila['completada']);
            return $to;
        }
        else {
            return 0;
        }
    }

    public function empezarASeguir(int $idUsuario, int $idRutina) {
        $query = sprintf("INSERT into rutinas_usuarios values ('%s', '%s', 0)", $this->limpiarString($idUsuario), $this->limpiarString($idRutina));
        $this->insert($query);
    }

    public function marcarComoCompletada(int $idUsuario, int $idRutina) {
        $idUsuario = $this->limpiarString($idUsuario);
        $idRutina = $this->limpiarString($idRutina);
        $query = "INSERT into rutinas_usuarios values ('$idUsuario', '$idRutina', 1) ON DUPLICATE KEY UPDATE completada = 1";
        $this->modify($query);
    }
    public function dejarDeSeguir(int $idUsuario, int $idRutina) {
        $query = sprintf("DELETE from rutinas_usuarios WHERE idUsuario = '%s' AND idRutina = '%s'", $this->limpiarString($idUsuario), $this->limpiarString($idRutina));
        $this->modify($query);
    }

    public function getNumRutinasCompletadas(int $idUsuario) {
        $query = sprintf("SELECT * FROM rutinas_usuarios WHERE idUsuario = '%s'", $this->limpiarString($idUsuario));
        $resultado = $this->select($query);
        return count($resultado);
    }
}