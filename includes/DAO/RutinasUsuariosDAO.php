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
}