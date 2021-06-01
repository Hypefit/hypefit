<?php

namespace hypefit\TO;

class RutinasUsuarios {
    private int $idUsuario;
    private int $idRutina;
    private int $completada;

    /**
     * @return int
     */
    public function getIdUsuario(): int {
        return $this->idUsuario;
    }

    /**
     * @param int $idUsuario
     */
    public function setIdUsuario(int $idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return int
     */
    public function getIdRutina(): int {
        return $this->idRutina;
    }

    /**
     * @param int $idRutina
     */
    public function setIdRutina(int $idRutina): void {
        $this->idRutina = $idRutina;
    }

    /**
     * @return int
     */
    public function getCompletada(): int {
        return $this->completada;
    }

    /**
     * @param int $completada
     */
    public function setCompletada(int $completada): void {
        $this->completada = $completada;
    }


}