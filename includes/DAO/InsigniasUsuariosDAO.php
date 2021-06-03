<?php

namespace hypefit\DAO;

class InsigniasUsuariosDAO extends DAO {
    public function existeInsignia(int $idUsuario, int $idInsignia) {
        $query = sprintf("SELECT * FROM insignias_usuarios WHERE idInsignia = '%s' AND idUsuario = '%s'", $this->limpiarString($idInsignia), $this->limpiarString($idUsuario));
        $resultado = $this->select($query);
        if (!empty($resultado)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function insertar(int $idUsuario, int $idInsignia) {
        $query = sprintf("INSERT into insignias_usuarios values ('%s', '%s')", $this->limpiarString($idInsignia), $this->limpiarString($idUsuario));
        return $this->insert($query);
    }

    public function getInsigniasUsuario(int $idUsuario){
        $query = sprintf("SELECT * FROM insignias_usuarios WHERE idUsuario = '%s'", $this->limpiarString($idUsuario));
        $resultado = $this->select($query);
        return $resultado;
    }
}