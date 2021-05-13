<?php

namespace hypefit\TO;

class Receta {
    private string $receta = "";
    private int $idNutricionista = 0;
    private string $categoria = "";
    private int $id = 0;
    private string $titulo = "";
    private string $descripcion="";

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
    public function getDescripcion(): string {
        return $this->descripcion;
    }
    /**
    * @param string $descripcion
    */
    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getReceta(): string {
        return $this->receta;
    }

    /**
     * @param string $receta
     */
    public function setReceta(string $receta): void {
        $this->receta = $receta;
    }

    /**
     * @return int
     */
    public function getIdNutricionista(): int {
        return $this->idNutricionista;
    }

    /**
     * @param int $idNutricionista
     */
    public function setIdNutricionista(int $idNutricionista): void {
        $this->idNutricionista = $idNutricionista;
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