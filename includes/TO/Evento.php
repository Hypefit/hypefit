<?php

namespace hypefit\TO;

class Evento {
    private int $id;
    private string $titulo;
    private string $fechaInicio;
    private string $fechaFin;
    private string $descripcion;
    private int $idCreador;

    /**
     * @return int
     */
    public function getIdCreador(): int {
        return $this->idCreador;
    }

    /**
     * @param int $idCreador
     */
    public function setIdCreador(int $idCreador): void {
        $this->idCreador = $idCreador;
    }

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
     * @return string
     */
    public function getTitulo(): string {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getFechaInicio(): string {
        return $this->fechaInicio;
    }

    /**
     * @param string $fechaInicio
     */
    public function setFechaInicio(string $fechaInicio): void {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return string
     */
    public function getFechaFin(): string {
        return $this->fechaFin;
    }

    /**
     * @param string $fechaFin
     */
    public function setFechaFin(string $fechaFin): void {
        $this->fechaFin = $fechaFin;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }


}