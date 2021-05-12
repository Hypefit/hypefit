<?php

namespace hypefit\TO;

class ComentarioReceta
{
    private int $id = 0;
    private int $idUsuario = 0;
    private int $idReceta = 0;
    private string $fecha = "";
    private int $valoracion = 0;
    private string $texto = "";

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }


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
    public function getIdReceta(): int {
        return $this->idReceta;
    }

    /**
     * @param int $idReceta
     */
    public function setIdReceta(int $idReceta): void {
        $this->idReceta = $idReceta;
    }

    /**
     * @return string
     */
    public function getFecha(): string {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha(string $fecha): void {
        $this->fecha = $fecha;
    }

    /**
     * @return string
     */
    public function getTexto(): string {
        return $this->texto;
    }

    /**
     * @param string $texto
     */
    public function setTexto(string $texto): void {
        $this->texto = $texto;
    }


    /**
     * @return int
     */
    public function getValoracion(): int {
        return $this->valoracion;
    }

    /**
     * @param int $idUsuario
     */

    public function setValoracion(int $valoracion): void {
        $this->valoracion = $valoracion;
    }


}