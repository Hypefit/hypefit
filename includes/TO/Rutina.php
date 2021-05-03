<?php

namespace hypefit\TO;

class Rutina {
    private string $rutina = "";
    private int $idEntrenador = 0;
    private string $categoria = "";
    private int $id = 0;
    private string $titulo = "";

    /**
     * @return string
     */
    public function getTitulo(): string {
        return $this->titulo;
    }/**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getRutina(): string {
        return $this->rutina;
    }

    /**
     * @param string $rutina
     */
    public function setRutina(string $rutina): void {
        $this->rutina = $rutina;
    }

    /**
     * @return int
     */
    public function getIdEntrenador(): int {
        return $this->idEntrenador;
    }

    /**
     * @param int $idEntrenador
     */
    public function setIdEntrenador(int $idEntrenador): void {
        $this->idEntrenador = $idEntrenador;
    }

    /**
     * @return string
     */
    public function getCategoria(): string {
        return $this->categoria;
    }

    /**
     * @param string $categoria
     */
    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
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

}